<?php

use Bramus\Router\Router;

require_once './vendor/autoload.php';
require_once './models/model.php';
require_once './controllers/controller.php';

$router = new Router();
$controller = new Controller();

$router->get('/', [$controller, 'getAllTrades']);

$router->get('/api/trades/index', [$controller, 'getAllTrades']);

$router->get('/api/trades/(\d+)', [$controller, 'getTradeById']);