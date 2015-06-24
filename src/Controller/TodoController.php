<?php

namespace Pagekit\Todo\Controller;

use Pagekit\Application as App;

class TodoController
{
    /**
     * @Access(admin=true)
     */
    public function indexAction()
    {

        $module = App::module('todo');
        $config = $module->config;

        return [
            '$view' => [
                'title' => __("TODO"),
                'name' => 'todo:views/admin/index.php'
            ],
            '$data' => [
                'config' => $config
            ],
            'entries' => $config['entries'],
        ];
    }

    /**
     * @Request({"entries": "array"}, csrf=true)
     * @Access(admin=true)
     */
    public function saveAction($entries = [])
    {
        App::config('todo')->set('entries', $entries);

        return ['message' => 'success'];
    }

    /**
     * @Route("/")
     */
    public function siteAction()
    {

        $module = App::module('todo');
        $config = $module->config;

        return [
            '$view' => [
                'title' => __("TODOs"),
                'name' => 'todo:views/index.php'
            ],

            'entries' => $config['entries']
        ];
    }
}