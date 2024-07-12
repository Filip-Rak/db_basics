<?php
require_once 'vendor/autoload.php';
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;


//Polaczenie z baza danych
$params = [
    'dbname' => "taskDB",
    'user' => 'root',
    'password' => "",
    'host' => '127.0.0.1',
    'driver' => 'pdo_mysql'
];

$isDevMode = true;
$config = Setup::createAttributeMetadataConfiguration(array(__DIR__), $isDevMode, null, null);
$entityManager = EntityManager::create($params, $config);