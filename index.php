<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use Illuminate\Database\Capsule\Manager as Capsule;

require 'vendor/autoload.php';

$app = new \Slim\app([
    'settings' => [
        'displayErrorDetails' => true
    ]
]);

$container = $app->getContainer();
$container['db'] = function() {

    $capsule = new Capsule;

    $capsule->addConnection([
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'slim',
        'username'  => 'root',
        'password'  => '',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ]);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

$app->get('/usuarios', function(Request $request, Response $response){

    $db = $this->get('db');
    /*$db->schema()->dropIfExists('usuarios');
    $db->schema()->create('usuarios', function($table){

        $table->increments('id');
        $table->string('nome');
        $table->string('email');
        $table->timestamps();

    });

    $db->table('usuarios')->insert([
        'nome' => 'Welton Carvalho',
        'email' => 'welton@gmail.com'
    ]);


    $db->table('usuarios')
                ->where('id', 1)
                ->update([
                    'nome' => 'Welton'
                ]);


    $db->table('usuarios')
                ->where('id', 1)
                ->delete();

    */

    
    $usuarios = $db->table('usuarios')->get();

    foreach ($usuarios as $usuario) {
        echo $usuario->nome . '<br>';
    }
    

});


$app->run();