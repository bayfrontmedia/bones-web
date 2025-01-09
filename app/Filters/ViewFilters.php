<?php

namespace App\Filters;

use Bayfront\Bones\Abstracts\FilterSubscriber;
use Bayfront\Bones\Application\Services\Filters\FilterSubscription;
use Bayfront\Bones\Application\Utilities\App;
use Bayfront\Bones\Interfaces\FilterSubscriberInterface;
use Bayfront\RouteIt\Router;
use Bayfront\Translation\Translate;
use Bayfront\Translation\TranslationException;

/**
 * View-related filters.
 */
class ViewFilters extends FilterSubscriber implements FilterSubscriberInterface
{

    protected Router $router;
    protected Translate $translate;

    /**
     * The container will resolve any dependencies.
     */

    public function __construct(Router $router, Translate $translate)
    {
        $this->router = $router;
        $this->translate = $translate;
    }

    /**
     * @inheritDoc
     */

    public function getSubscriptions(): array
    {
        return [
            new FilterSubscription('webapp.response.data', [$this, 'addData'], 10),
            new FilterSubscription('webapp.response.body', [$this, 'addTagSay'], 10)
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

            } catch (TranslationException) {

                /*
                 * No translation exists for this tag.
                 * Do nothing.
                 */

            }

        }

        return $body;

    }

}