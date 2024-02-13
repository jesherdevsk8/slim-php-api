<?php
require __DIR__ . '/vendor/autoload.php';

use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Faker\Factory as FakerFactory;

$app = AppFactory::create();
$renderer = new PhpRenderer(__DIR__);

$app->get('/{format}', function ($request, $response, $args) use ($renderer) {
    $faker  = FakerFactory::create();
    $format = isset($args['format']) ? $args['format'] : 'api';
    $name   = $request->getQueryParams()['name'] ?? 'Usuário';

    $usuarios = [];

    for ($i = 0; $i < 20; $i++) {
        $usuarios[] = [
            'id' => $i + 1,
            'nome' => $faker->name,
            'email' => $faker->email
        ];
    }

    if ($format === 'api') {
        $response->getBody()->write(json_encode($usuarios));
        return $response->withHeader('Content-Type', 'application/json');
    } else {
        return $renderer->render($response, 'src/index.php', ['usuarios' => $usuarios, 'name' => $name]);
    }
});

$app->run();
