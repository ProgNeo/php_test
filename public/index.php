<?php

require_once '../vendor/autoload.php';
require_once "../controllers/MainController.php";
require_once "../controllers/HellsingUltimateController.php";
require_once "../controllers/HellsingUltimateImageController.php";
require_once "../controllers/HellsingUltimateInfoController.php";
require_once "../controllers/SteinsGateController.php";
require_once "../controllers/SteinsGateImageController.php";
require_once "../controllers/SteinsGateInfoController.php";
require_once "../controllers/Controller404.php";

$loader = new \Twig\Loader\FilesystemLoader('../views');

$twig = new \Twig\Environment($loader);

$url = $_SERVER["REQUEST_URI"];

$controller = new Controller404($twig);

if ($url == "/") {
    $controller = new MainController($twig);
} elseif (preg_match("#^/steins-gate/image#", $url)) {
    $controller = new SteinsGateImageController($twig);
} elseif (preg_match("#^/steins-gate/info#", $url)) {
    $controller = new SteinsGateInfoController($twig);
} elseif (preg_match("#^/steins-gate#", $url)) {
    $controller = new SteinsGateController($twig);
} elseif (preg_match("#^/hellsing-ultimate/image#", $url)) {
    $controller = new HellsingUltimateImageController($twig);
} elseif (preg_match("#^/hellsing-ultimate/info#", $url)) {
    $controller = new HellsingUltimateInfoController($twig);
} elseif (preg_match("#^/hellsing-ultimate#", $url)) {
    $controller = new HellsingUltimateController($twig);
}

if ($controller) {
    $controller->get();
}
?>