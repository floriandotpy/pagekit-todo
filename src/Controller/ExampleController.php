<?php

namespace Pagekit\Example\Controller;

use Pagekit\Application as App;

class ExampleController
{
    /**
     * @Access(admin=true)
     */
    public function indexAction()
    {

        $config = App::config('example');

        return [
            '$view' => [
                'title' => __("TODO"),
                'name' => 'example:views/admin/index.php'
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
        App::config('example')->set('entries', $entries);

        return ['message' => 'success'];
    }

    /**
     * @Route("/")
     */
    public function siteAction()
    {

        $config = App::config('example');

        return [
            '$view' => [
                'title' => __("TODOs"),
                'name' => 'example:views/index.php'
            ],

            'entries' => $config['entries']
        ];
    }
}