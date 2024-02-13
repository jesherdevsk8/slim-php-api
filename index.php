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
    $faker  = FakerFactory::create();
    $format = $request->getQueryParams()['format'] ?? 'html';
    $name   = $request->getQueryParams()['name'] ?? 'User';

    $usuarios = [];
    $numUsers = ($format === 'api') ? 100 : 10;

    for ($i = 0; $i < $numUsers; $i++) {
        $usuarios[] = [
            'id' => $i + 1,
            'nome' => $faker->name,
            'email' => $faker->email
        ];
    }

    if ($format === 'api') {
        $response->getBody()->write(json_encode($usuarios));
        return $response->withHeader('Content-Type', 'application/json');
    } elseif($format === 'html') {
        return $renderer->render($response, 'src/index.php', ['usuarios' => $usuarios, 'name' => $name]);
    } else {
        return $response->withStatus(400)->write('Formato inválido. Use "api" para retorno em json"');
    }
});

$app->run();
