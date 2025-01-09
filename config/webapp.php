<?php

/*
 * For more information, see:
 * https://github.com/bayfrontmedia/bones-service-webapp/blob/master/docs/setup.md#configuration
 *
 * NOTE:
 * This entire array is added to the Veil data array with key of "webapp"
 */

return [
    'locale' => [ // Locale settings
        'enabled' => true,
        'valid' => [ // Valid locales for which translations exist
            'en',
            'es'
        ],
        'default' => 'en', // Default locale
        'cookie' => [
            'name' => 'locale',
            'duration' => 43200 // Cookie duration (in minutes)
        ],
        'routes' => [
            'redirect' => true, // Add locale to routes?
            'exclude' => [
                'hosts' => [],
                'paths' => [
                    '/api'
                ],
                'param' => 'locale_exclude'
            ]
        ]
    ],
    'public' => [ // Added to Veil data array with key of "webapp"
        'version' => '1.0.0', // Web app version
    ]
];