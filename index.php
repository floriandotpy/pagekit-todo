<?php

use Pagekit\Application;

return [

    'name' => 'todo',

    'main' => function(Application $app) {

    },

    'autoload' => [
        'Pagekit\\Todo\\' => 'src'
    ],

    'resources' => [
        'todo:' => ''
    ],

    'routes' => [
        '@todo' => [
            'path' => '/todo',
            'controller' => 'Pagekit\\Todo\\Controller\\TodoController'
        ]
    ],

    'config' => [
        'entries' => []
    ],

    'menu' => [

        'todo' => [
            'label'  => 'ToDo',
            'icon'   => 'app/system/assets/images/placeholder-icon.svg',
            'url'    => '@todo',
            'active' => '@todo/*',
            'access' => 'todo: manage'
        ]

    ],

];
