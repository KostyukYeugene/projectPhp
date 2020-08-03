<?php

require_once __DIR__ . '/vendor/autoload.php';

use ProjectPhp\Controllers\UsersController;
use ProjectPhp\Services\ConnectionToDb;
use Symfony\Component\Dotenv\Dotenv;
use ProjectPhp\Controllers\MainController;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dotenv = new Dotenv();
$dotenv->usePutenv()->load(__DIR__ . '/.env');

switch ($_SERVER['REQUEST_URI']) {
    case '/users':
        $controller = new UsersController();
        $controller->indexAction();
        break;
    case '/':
        $mainController = new MainController();
        $mainController->loginAction();
        break;
    default:
        $error = new MainController();
        $error->notFoundAction();
}

