<?php /** @noinspection PhpRedundantMethodOverrideInspection */

namespace App\Exceptions;

use Bayfront\Bones\Abstracts\ExceptionHandler;
use Bayfront\Bones\Interfaces\ExceptionHandlerInterface;
use Bayfront\HttpResponse\Response;
use Throwable;

/**
 * Exception Handler.
 */
class Handler extends ExceptionHandler implements ExceptionHandlerInterface
{

    /**
     * Fully namespaced exception classes to exclude from reporting.
     *
     * @var array $excluded_classes
     */

    protected array $excluded_classes = [
        'Bayfront\Bones\Exceptions\HttpException'
    ];

    /**
     * @inheritDoc
     */

    public function getExcludedClasses(): array
    {
        return $this->excluded_classes;
    }

    /**
     * @inheritDoc
     */

    public function report(Response $response, Throwable $e): void
    {
        parent::report($response, $e);
    }

    /**
     * @inheritDoc
     */

    public function respond(Response $response, Throwable $e): void
    {
        parent::respond($response, $e);
    }

}