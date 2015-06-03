<?php

use Pagekit\Application;

return [

    'name' => 'example',

    'main' => function(Application $app) {

        $app->on('app.site', function() {
//            echo "Hello user.";
        });

        $app->on('app.admin', function() {
//            echo "Hello admin.";
        });
    },

    'autoload' => [
        'Pagekit\\Example\\' => 'src'
    ],

    'resources' => [
        'example:' => ''
    ],

    'routes' => [
        '@example' => [
            'path' => '/example',
            'controller' => [
                'Pagekit\\Example\\Controller\\ExampleController'
            ]
        ]
    ],

    'config' => [
        'entries' => [
            ['message' => 'Buy milk.', 'done' => false],
            ['message' => 'Read book.', 'done' => false],
            ['message' => 'Drink coffee.', 'done' => true]
        ]
    ],

    'menu' => [

        'example' => [
            'label'  => 'Example',
            'icon'   => 'app/system/assets/images/placeholder-icon.svg',
            'url'    => '@example',
            'active' => '@example/*',
            'access' => 'example: manage'
        ]


    ],



];
