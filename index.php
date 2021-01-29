<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require 'vendor/autoload.php';

$app = new \Slim\app;

$app->get('/postagens', function(Request $request, Response $response) {

    $response->getBody()->write("Listagens de postagens");

    return $response;

});

$app->post('/usuarios/adiciona', function(Request $request, Response $response) {

    $post = $request->getParsedBody();

    return $response->getBody()->write($post['nome'] . " - " . $post['email']);

});

$app->put('/usuarios/atualiza', function(Request $request, Response $response) {

    $post = $request->getParsedBody();

    return $response->getBody()->write($post['nome'] . " - " . $post['email']);

});

$app->delete('/usuarios/deleta', function(Request $request, Response $response) {

    $post = $request->getParsedBody();

    return $response->getBody()->write($post['nome'] . " - " . $post['email']);

});

$app->run();