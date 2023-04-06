<?php

namespace App\Controllers;

use Bayfront\Bones\Abstracts\Controller;
use Bayfront\Bones\Application\Services\EventService;
use Bayfront\Bones\Application\Services\FilterService;
use Bayfront\HttpResponse\Response;

/**
 * Errors Controller.
 *
 * This controller should only be resolved by the exception handler,
 * which will have already set the response status code.
 */
class Errors extends Controller
{

    protected EventService $events;
    protected FilterService $filters;
    protected Response $response;

    /**
     * The container will resolve any dependencies.
     * EventService is required by the abstract controller.
     */

    public function __construct(EventService $events, FilterService $filters, Response $response)
    {
        $this->events = $events;
        $this->filters = $filters;
        $this->response = $response;

        parent::__construct($events);
    }

    /**
     * 404
     *
     * @param array $data (Exception data)
     * @return void
     */

    public function error404(array $data): void
    {

        $this->events->doEvent('error.404', $data);

        $body = '<h1>&#x26D4; 404: Not Found</h1>';

        $this->response->setBody($this->filters->doFilter('response.body', $body))->send();
    }

}