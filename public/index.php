<?php

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

require_once '../vendor/autoload.php';
require_once '../framework/autoload.php';
require_once '../controllers/MainController.php';
require_once '../controllers/ObjectController.php';
require_once '../controllers/Controller404.php';
require_once '../controllers/SearchController.php';
require_once '../controllers/AnimeCreateController.php';

$loader = new FilesystemLoader('../views');
$twig = new Environment($loader, [
    "debug" => true
]);
$twig->addExtension(new DebugExtension());

$pdo = new PDO("mysql:host=localhost;dbname=anime;charset=utf8", "root", "");

$router = new Router($twig, $pdo);
$router->add("/", MainController::class);
$router->add("/search", SearchController::class);
$router->add("/anime/(?P<id>\d+)", ObjectController::class);
$router->add("/anime/create", AnimeCreateController::class);
$router->get_or_default(Controller404::class);