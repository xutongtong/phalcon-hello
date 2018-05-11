<?php
use Phalcon\Mvc\Micro;

$di = new \Phalcon\Di\FactoryDefault();

include './services.php';

$app = new Micro($di);

$app->get('/api/redis', function () use ($app) {
    $app->redis->save('my-data', [1, 2, 3, 4, 5]);
});

// Retrieves all robots
$app->get('/api/robots', function () use ($app){
    $data = $app->redis->get('my-data');
    $app->response->setStatusCode(200);
    $app->response->setJsonContent($data);
    return $app->response;
});

$app->handle();
