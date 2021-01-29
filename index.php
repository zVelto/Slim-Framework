<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\app([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

class Servico {

}

$container = $app->getContainer();
$container['servico'] = function() {
    return new Servico;
};

$app->get('/servico', function(Request $request, Response $response) {

    $servico = $this->get('servico');
    var_dump($servico);

});

$container = $app->getContainer();
$container['Home'] = function() {
    return new MyApp\controllers\Home(new MyApp\View);
};

$app->get('/usuario', 'Home:index');


$app->run();