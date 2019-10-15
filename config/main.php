<?php

use NovemBit\i18n\Module;
use NovemBit\i18n\component\languages\Languages;
use NovemBit\i18n\component\request\Request;
use NovemBit\i18n\component\rest\Rest;
use NovemBit\i18n\component\translation\method\Dummy;
use NovemBit\i18n\component\translation\method\Google;
use NovemBit\i18n\component\translation\Translation;
use NovemBit\i18n\component\translation\type\HTML;
use NovemBit\i18n\component\translation\type\JSON;
use NovemBit\i18n\component\translation\type\Text;
use NovemBit\i18n\component\translation\type\URL;
use NovemBit\i18n\system\component\DB;
use NovemBit\i18n\system\parsers\html\Rule;

return [

    'class' => Module::class,

    'translation' => [
        'class' => Translation::class,
        'method' => [
            /*'class' => NovemBit\i18n\component\translation\method\RestMethod::class,
            'remote_host'=>'i18n.adcleandns.com',
            'api_key' => 'demo_key_123',
            'exclusions' => ['barev', 'barev duxov', "hayer", 'Hello'],
            'validation' => true,
            'save_translations' => true*/

            'class' => Google::class,
            'api_key' => 'AIzaSyA3STDoHZLxiaXXgmmlLuQGdX6f9HhXglA',
            'exclusions' => ['barev', 'barev duxov', "hayer", 'Hello'],
            'validation' => true,
            'save_translations' => true,

            /*
            'class' => Dummy::class,
            'exclusions' => ['barev', 'barev duxov', "hayer", 'Hello'],
            'validation' => true,
            'save_translations' => true*/
        ],
        'text' => [
            'class' => Text::class,
            'save_translations' => true,
            /*'exclusions' => [ "Hello"],*/
        ],
        'url' => [
            'class' => URL::class,
            'url_validation_rules' => [
                'host' => [
                    '^$|^swanson\.co\.uk$|^swanson\.fr$',
                ]
            ]
        ],
        'html' => [
            'class' => HTML::class,
            'save_translations' => false,
        ],
        'json' => [
            'class' => JSON::class,
            'save_translations' => false
        ]
    ],
    'languages' => [
        'class' => Languages::class,
        'accept_languages' => ['ar', 'hy', 'fr', 'it', 'de', 'ru', 'en'],
        'from_language' => 'en',
        'default_language' => [
            'swanson.fr' => 'fr',
            'swanson.am' => 'hy',
            'swanson.it' => 'it',
            'swanson.ru' => 'ru',
            'swanson.co.uk' => 'en',
            'default' => 'en'
        ],
        'path_exclusion_patterns' => [
            '.*\.php',
            '.*\.jpg',
            '.*wp-admin',
        ],
    ],
    'request' => [
        'class' => Request::class
    ],
    'rest' => [
        'class' => Rest::class,
        'api_keys' => [
            'demo_key_123'
        ]
    ],
    'db' => [
        'class' => DB::class,
        'connection' => [
            'dsn' => 'mysql:host=localhost;dbname=i18n',
            'username' => 'i18n',
            'password' => 'Novem9bit',
            'charset' => 'utf8mb4',
            'tablePrefix' => 'i18n_',
            /*'enableQueryCache' => true,
            'enableSchemaCache' => true,
            'schemaCacheDuration' => 3000,
            'schemaCache' => 'cache',*/
        ],
    ]
];