<?php
require __DIR__ . '/vendor/autoload.php';

use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Faker\Factory as FakerFactory;

$app = AppFactory::create();
$renderer = new PhpRenderer(__DIR__);

$app->get('/', function ($request, $response, $args) use ($renderer) {
    $faker = FakerFactory::create();
    $usuarios = [];

    for ($i = 0; $i < 10; $i++) {
        $usuarios[] = [
            'id' => $i + 1,
            'nome' => $faker->name,
            'email' => $faker->email
        ];
    }

    return $renderer->render($response, 'index.php', ['usuarios' => $usuarios]);
});

$app->run();
