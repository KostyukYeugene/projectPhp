<?php

require_once __DIR__ . '/vendor/autoload.php';

use ProjectPhp\Services\Router;
use Symfony\Component\Dotenv\Dotenv;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dotenv = new Dotenv();
$dotenv->usePutenv()->load(__DIR__ . '/.env');
session_start();
Router::navigate();
