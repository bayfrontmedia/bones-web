<?php

namespace App\Controllers;

use Bayfront\BonesService\WebApp\Abstracts\WebAppController;
use Bayfront\BonesService\WebApp\Exceptions\WebAppServiceException;
use Bayfront\BonesService\WebApp\WebAppService;

/**
 * Home controller.
 */
class Home extends WebAppController
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
     * @param array $params
     * @return void
     * @throws WebAppServiceException
     */
    public function index(array $params): void
    {

        $this->webAppService->respond('examples/pages/home', [
            'page' => [
                'title' => 'Homepage',
                'description' => 'This is a homepage example'
            ],
            'params' => $params
        ]);

    }

}