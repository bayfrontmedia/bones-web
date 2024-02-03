<?php

namespace App\Filters;

use Bayfront\Bones\Abstracts\FilterSubscriber;
use Bayfront\Bones\Application\Services\Filters\FilterSubscription;
use Bayfront\Bones\Application\Utilities\App;
use Bayfront\Bones\Interfaces\FilterSubscriberInterface;
use Bayfront\Cookies\Cookie;
use Bayfront\Translation\Translate;

/**
 * Locale-related filters.
 */
class Locale extends FilterSubscriber implements FilterSubscriberInterface
{

    protected Translate $translate;

    /**
     * The container will resolve any dependencies.
     */

    public function __construct(Translate $translate)
    {
        $this->translate = $translate;
    }

    /**
     * @inheritDoc
     */

    public function getSubscriptions(): array
    {
        return [
            new FilterSubscription('router.route_prefix', [$this, 'addLocaleToPrefix'], 10),
            new FilterSubscription('veil.data', [$this, 'addLocaleArray'], 10)
        ];
    }

    /**
     * Add locale to route prefix if enabled.
     *
     * @param string $prefix
     * @return string
     */

    public function addLocaleToPrefix(string $prefix): string
    {

        $cookie_name = App::getConfig('app.locale.cookie.name', 'locale');

        if (App::getConfig('app.locale.routes.update')
            && Cookie::has($cookie_name)
            && in_array(Cookie::get($cookie_name), App::getConfig('app.locale.valid', []))) {

            return rtrim($prefix, '/') . '/' . Cookie::get($cookie_name) . '/';

        }

        return $prefix;

    }

    /**
     * Add locale values to the $data array.
     *
     * @param array $data
     * @return array
     */

    public function addLocaleArray(array $data): array
    {
        return array_merge($data, [
            'locale' => [
                'all' => App::getConfig('app.locale.valid', []),
                'current' => $this->translate->getLocale()
            ]
        ]);
    }

}