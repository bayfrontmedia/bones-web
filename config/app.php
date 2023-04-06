<?php

use Bayfront\Bones\Application\Utilities\App;

return [
    'namespace' => 'App\\', // Namespace for the app/ directory, as specified in composer.json
    'key' => App::getEnv('APP_KEY'), // Unique to the app, not to the environment
    'debug' => App::getEnv('APP_DEBUG'),
    'environment' => App::getEnv('APP_ENVIRONMENT'), // e.g.: "dev", "staging", "qa", "prod"
    'timezone' => App::getEnv('APP_TIMEZONE'), // See: https://www.php.net/manual/en/timezones.php
    'events' => [
        'autoload' => true,
        'load' => []
    ],
    'filters' => [
        'autoload' => true,
        'load' => []
    ],
    'commands' => [
        'autoload' => true,
        'load' => []
    ],
    'backup_path' => App::getEnv('APP_BACKUP_PATH'), // Optional. Used with deploy: commands
    'locale' => [ // Locale settings
        'valid' => [
            'en',
            'es'
        ],
        'default' => 'en',
        'cookie' => [
            'name' => 'locale',
            'duration' => 43200
        ],
        'routes' => [
            'update' => true,
            'exclude' => [
                'hosts' => [],
                'paths' => [
                    '/api'
                ],
                'param' => 'locale_exclude'
            ]
        ]
    ],
    'version' => '1.0.0' // App version
];