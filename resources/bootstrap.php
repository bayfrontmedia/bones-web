<?php /** @noinspection PhpUnhandledExceptionInspection */

use Bayfront\Bones\Application\Utilities\App;
use Bayfront\Translation\Adapters\Local;
use Bayfront\Translation\Translate;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\BrowserConsoleHandler;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Level;
use Monolog\Logger;

/** @var Bayfront\Container\Container $container */

/*
 * This file is used to bootstrap the app, and is required by Bones.
 * Bootstrapping is primarily done by interacting with the service container
 * by adding all the required dependencies which will be used throughout the app,
 * and defining their alias, if desired.
 *
 * The service container is available in this file as $container, which already contains
 * all the default services.
 *
 * For more information, see:
 * https://github.com/bayfrontmedia/container#usage
 */

/*
|--------------------------------------------------------------------------
| Add services
|--------------------------------------------------------------------------
*/

// Translate

$container->set('Bayfront\Translation\Translate', function () {

    $adapter = new Local(App::resourcesPath('/translations'));

    return new Translate($adapter, App::getConfig('app.locale.default', 'en'), true);

});

$container->setAlias('translate', 'Bayfront\Translation\Translate');

// Filesystem

$container->set('League\Flysystem\Filesystem', function() {

    $adapter = new League\Flysystem\Local\LocalFilesystemAdapter(App::storagePath('/app'));
    return new League\Flysystem\Filesystem($adapter);

});

$container->setAlias('filesystem', 'League\Flysystem\Filesystem');

// Log

$container->set('Monolog\Logger', function() {

    $log = new Logger('app');

    if (App::environment() == App::ENV_DEV) {
        $log->pushHandler(new BrowserConsoleHandler());
    }

    $level = App::environment() == App::ENV_DEV ? Level::Debug : Level::Info;

    $file_handler = new RotatingFileHandler(App::storagePath('/app/logs/app.log'), 90, $level);

    $output = "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n";
    $date_format = 'Y-m-d H:i:s T';

    $file_handler->setFormatter(new LineFormatter($output, $date_format));

    $log->pushHandler($file_handler);

    return $log;

});

$container->setAlias('log', 'Monolog\Logger');