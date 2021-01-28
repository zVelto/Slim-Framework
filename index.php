<?php

require 'vendor/autoload.php';

$app = new \Slim\app;

$app->get('/postagens', function() {

    echo "Lista postagens";

});

$app->get('/usuarios[/{id}]', function($request, $response) {

    $id = $request->getAttribute('id');
    echo "Usuário ". $id;

});

$app->get('/posts[/{ano}[/{mes}]]', function($request, $response) {

    $ano = $request->getAttribute('ano');
    $mes = $request->getAttribute('mes');

    echo "post - ". $ano . " / " . $mes;

});

$app->get('/lista/{itens:.*}', function($request, $response) {

    $itens = $request->getAttribute('itens');

    var_dump(explode("/", $itens));

});

$app->get('/blog/postagens/{id}', function($request, $response) {
    echo "Listar";
})->setName("blog");

$app->get('/meusite', function($request, $response) {

    $retorno = $this->get("router")->pathFor("blog", ["id" => 10] );

    echo $retorno;

});

$app->group('/v1', function() {

    $this->get('/postagens', function() {

        echo "Lista postagens";
    
    });

    $this->get('/usuarios', function() {

        echo "Lista usuarios";
    
    });

});

$app->run();