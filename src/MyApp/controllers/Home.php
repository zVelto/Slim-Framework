<?php

namespace MyApp\controllers;

class home {

    protected $view;

    public function __construct($view) {
        $this->view = $view;
    }

    public function index($request, $response) {
        //$view = $this->container->get('View');
        var_dump($this->view);
        return $response->write('Teste index');
    }

}
?>