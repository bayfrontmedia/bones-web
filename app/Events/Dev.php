<?php /** @noinspection PhpUnused */

namespace App\Events;

use Bayfront\Bones\Abstracts\EventSubscriber;
use Bayfront\Bones\Application\Utilities\App;
use Bayfront\Bones\Interfaces\EventSubscriberInterface;
use Monolog\Logger;

/**
 * Actions to perform when environment = "dev".
 */
class Dev extends EventSubscriber implements EventSubscriberInterface
{

    /**
     * @var Logger
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

        if (App::environment() != App::ENV_DEV) {
            return [];
        }

        return [
            'app.bootstrap' => [
                [
                    'method' => 'logDevMode',
                    'priority' => 5
                ]
            ]
        ];
    }

    /**
     * Add a log entry with level debug to notify that Bones is operating in dev mode.
     *
     * @return void
     */

    public function logDevMode(): void
    {
        $this->log->debug('Bones is operating in dev mode');
    }

}