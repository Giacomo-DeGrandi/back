<?php

require_once 'config/init.php';
require_once 'config/auth.php';
require_once 'app/src/lib/Router.php';


require_once 'app/src/Controllers/FrontController.php';
require_once 'app/src/Controllers/SignupController.php';
require_once 'app/src/Controllers/SignupClientController.php';
require_once 'app/src/Controllers/SearchController.php';
require_once 'app/src/Controllers/CatalogueController.php';
require_once 'app/src/Controllers/HomeController.php';


use App\Controllers\HomeController\HomeController;
use App\Controllers\CatalogueController\CatalogueController;
use App\Controllers\SearchController\SearchController;
use App\Controllers\FrontController\FrontController;
use App\Controllers\SignupController\SignupController;
use App\Lib\Router\Router;

$router = new Router();
$router->route();