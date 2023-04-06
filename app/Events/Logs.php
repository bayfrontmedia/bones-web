<?php /** @noinspection PhpUnused */

namespace App\Events;

use Bayfront\Bones\Abstracts\EventSubscriber;
use Bayfront\Bones\Interfaces\EventSubscriberInterface;
use Bayfront\HttpRequest\Request;
use Monolog\Logger;

/**
 * Log entry modifications.
 */
class Logs extends EventSubscriber implements EventSubscriberInterface
{

    /**
     * @var Logger $log
     */
    protected Logger $log;

    /**
     * The container will resolve any dependencies.
     */

    public function __construct(Logger $log)
    {
        $this->log = $log;
    }

    /**
     * @inheritDoc
     */

    public function getSubscriptions(): array
    {
        return [
            'app.http' => [
                [
                    'method' => 'addRequestInfo',
                    'priority' => 5
                ]
            ]
        ];
    }

    /**
     * Adds URL, HTTP method and IP of all HTTP requests to log extra array.
     *
     * @return void
     */

    public function addRequestInfo(): void
    {

        $this->log->pushProcessor(function ($record) {

            $record['extra']['url'] = Request::getUrl(true);
            $record['extra']['http_method'] = Request::getMethod();
            $record['extra']['ip'] = Request::getIp();

            return $record;

        });

    }

}