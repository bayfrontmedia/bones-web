<?php /** @noinspection PhpUnused */

namespace App\Events;

use Bayfront\Bones\Abstracts\EventSubscriber;
use Bayfront\Bones\Application\Services\Events\EventSubscription;
use Bayfront\Bones\Exceptions\HttpException;
use Bayfront\Bones\Interfaces\EventSubscriberInterface;
use Bayfront\HttpRequest\Request;
use Bayfront\HttpResponse\Response;
use Monolog\Logger;
use Throwable;

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
            new EventSubscription('app.http', [$this, 'addRequestInfo'], 10),
            new EventSubscription('bones.exception', [$this, 'logException'], 10)
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

    /**
     * Log exceptions which are not an instance of HttpException.
     *
     * @param Response $response
     * @param Throwable $e
     * @return void
     */
    public function logException(Response $response, Throwable $e): void
    {

        if (!$e instanceof HttpException) {

            $this->log->critical($e->getMessage(), [
                'status' => (string)$response->getStatusCode()['code'],
                'message' => $e->getMessage(),
                'type' => get_class($e),
                'code' => (string)$e->getCode(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTrace()
            ]);

        }

    }

}