<?php

namespace App\Filters;

use Bayfront\Bones\Abstracts\FilterSubscriber;
use Bayfront\Bones\Application\Services\Filters\FilterSubscription;
use Bayfront\Bones\Application\Utilities\App;
use Bayfront\Bones\Interfaces\FilterSubscriberInterface;
use Bayfront\RouteIt\Router;

/**
 * View-related filters.
 */
class ViewFilters extends FilterSubscriber implements FilterSubscriberInterface
{

    protected Router $router;

    /**
     * The container will resolve any dependencies.
     */

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * @inheritDoc
     */

    public function getSubscriptions(): array
    {
        return [
            new FilterSubscription('webapp.response.data', [$this, 'addData'], 10)
        ];
    }

    /**
     * Add data to the $data array.
     *
     * @param array $data
     * @return array
     */

    public function addData(array $data): array
    {
        return array_merge($data, [
            'bones' => [
                'version' => App::getBonesVersion()
            ],
            'year' => date('Y')
        ]);
    }

}