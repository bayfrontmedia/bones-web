<?php

namespace App\Filters;

use Bayfront\Bones\Abstracts\FilterSubscriber;
use Bayfront\Bones\Application\Services\Filters\FilterSubscription;
use Bayfront\Bones\Application\Utilities\App;
use Bayfront\Bones\Interfaces\FilterSubscriberInterface;
use Bayfront\RouteIt\Router;
use Bayfront\Translation\Translate;
use Bayfront\Translation\TranslationException;
use Monolog\Logger;

/**
 * View-related filters.
 */
class Views extends FilterSubscriber implements FilterSubscriberInterface
{

    protected Logger $log;
    protected Router $router;
    protected Translate $translate;

    /**
     * The container will resolve any dependencies.
     */

    public function __construct(Logger $log, Router $router, Translate $translate)
    {
        $this->log = $log;
        $this->router = $router;
        $this->translate = $translate;
    }

    /**
     * @inheritDoc
     */

    public function getSubscriptions(): array
    {
        return [
            new FilterSubscription('veil.data', [$this, 'addData'], 10),
            new FilterSubscription('response.body', [$this, 'addTagRoute'], 10),
            new FilterSubscription('response.body', [$this, 'addTagSay'], 10)
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
            'app' => [
                'version' => App::getConfig('app.version')
            ],
            'bones' => [
                'version' => App::getBonesVersion()
            ],
            'year' => date('Y')
        ]);
    }

    /**
     * Add support for the @route: template tag which returns the URL of any named route.
     *
     * @param string $body
     * @return string
     */

    public function addTagRoute(string $body): string
    {

        // @route

        preg_match_all("/@route:[\w.]+/", $body, $tags); // Any word character or period

        if (isset($tags[0]) && is_array($tags[0])) { // If a tag was found

            foreach ($tags[0] as $tag) {

                $use = explode(':', $tag, 2);

                if (isset($use[1])) { // If valid @route syntax

                    // Keep original string if not found

                    $body = str_replace($tag, $this->router->getNamedRoute($use[1], $use[1]), $body);

                }
            }

        }

        return $body;

    }

    /**
     * Add support for the @say: template tag which returns the translation of a given string.
     *
     * @param string $body
     * @return string
     */

    public function addTagSay(string $body): string
    {

        // @say

        preg_match_all("/@say:[\w.]+/", $body, $tags); // Any word character or period

        if (isset($tags[0]) && is_array($tags[0])) { // If a tag was found

            try {

                foreach ($tags[0] as $tag) {

                    $use = explode(':', $tag, 2);

                    if (isset($use[1])) { // If valid @say syntax

                        // Keep original string if not found

                        $body = str_replace($tag, $this->translate->get($use[1], [], $use[1]), $body);

                    }
                }

            } catch (TranslationException $e) {

                /*
                 * No translation exists for this tag.
                 * Do nothing.
                 */

                $this->log->critical('Unexpected translation exception', [
                    'exception' => $e->getTraceAsString()
                ]);

            }

        }

        return $body;

    }

}