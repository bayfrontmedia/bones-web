<?php /** @noinspection PhpUnhandledExceptionInspection */

use Bayfront\Bones\Application\Utilities\App;
use Bayfront\Translation\Adapters\Local;
use Bayfront\Translation\Translate;

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