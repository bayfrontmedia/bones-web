<?php

namespace App\Controllers;

use Bayfront\BonesService\WebApp\Abstracts\WebAppController;
use Bayfront\BonesService\WebApp\WebAppService;

/**
 * Errors Controller.
 *
 * This controller should only be resolved by the exception handler,
 * which will have already set the response status code.
 */
class Errors extends WebAppController
{

    /**
     * The container will resolve any dependencies.
     *
     * @param WebAppService $webAppService
     */
    public function __construct(WebAppService $webAppService)
    {
        parent::__construct($webAppService);
    }

    /**
     * @inheritDoc
     */
    public function isPrivate(): bool
    {
        return false;
    }

    /**
     * 404
     *
     * @param array $data (Exception data)
     * @return void
     */

    public function error404(array $data): void
    {
        $body = '<h1>&#x26D4; 404: Not Found</h1>';
        $this->webAppService->response->setBody($this->webAppService->filters->doFilter('webapp.response.body', $body))->send();
    }

}