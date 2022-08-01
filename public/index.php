<?php

$loader = require __DIR__ . '/../vendor/autoload.php';
$loader->addPsr4('Acme\\Test\\', __DIR__);

$app = new \Src\App();
try {
    $app->startApp();
} catch (Exception $e) {
    echo $e->getMessage();
}