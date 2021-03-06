<?php
/**
 * The bootstrap file creates and returns the container.
 */
use DI\ContainerBuilder;
require __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();
$containerBuilder = new ContainerBuilder;
$containerBuilder->addDefinitions(__DIR__ . '/config.php');
$container = $containerBuilder->build();
return $container;