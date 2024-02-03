<?php

namespace App\Filters;

use Bayfront\Bones\Abstracts\FilterSubscriber;
use Bayfront\Bones\Application\Services\Filters\FilterSubscription;
use Bayfront\Bones\Application\Utilities\App;
use Bayfront\Bones\Interfaces\FilterSubscriberInterface;

/**
 * Console-related filters.
 */
class Console extends FilterSubscriber implements FilterSubscriberInterface
{

    /**
     * The container will resolve any dependencies.
     */

    public function __construct()
    {

    }

    /**
     * @inheritDoc
     */

    public function getSubscriptions(): array
    {
        return [
            new FilterSubscription('about.bones', [$this, 'addAppInfo'], 10)
        ];
    }

    /**
     * Add app info to the array returned by the php bones about:bones console command.
     *
     * @param array $arr
     * @return array
     */

    public function addAppInfo(array $arr): array
    {
        return array_merge($arr, [
            'App version' => App::getConfig('app.version', '')
        ]);
    }

}