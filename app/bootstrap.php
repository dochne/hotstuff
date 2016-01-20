<?php

$appDir = dirname(__DIR__);

include_once($appDir . "/vendor/autoload.php");

use Silktide\Syringe\ReferenceResolver;
use Silktide\Syringe\ContainerBuilder;
use Silktide\Syringe\Loader\JsonLoader;
use Silktide\Syringe\Loader\YamlLoader;

$resolver = new ReferenceResolver();
$loaders = [
    new JsonLoader(),
    new YamlLoader()
];

$configPaths = [
    $appDir . "/app/config",
    $appDir
];

$builder = new ContainerBuilder($resolver, $configPaths);

foreach ($loaders as $loader) {
    $builder->addLoader($loader);
}
$builder->setApplicationRootDirectory($appDir);


$builder->addConfigFile("services.yml");
