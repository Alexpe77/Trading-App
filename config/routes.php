<?php

use Bramus\Router\Router;

require_once './vendor/autoload.php';
require_once './models/tradeModel.php';
require_once './controllers/tradeController.php';
require_once './models/profileModel.php';
require_once './controllers/profileController.php';

$router = new Router();
$controller = new TradeController();
$profile = new ProfileController();

$router->get('/', [$controller, 'getAllTrades']);

$router->get('/api/trades/index', [$controller, 'getAllTrades']);

$router->get('/api/trades/(\d+)', [$controller, 'getTradeById']);

$router->get('/api/login', [$controller, ]); // TODO : Add login function

$router->post('/api/signup' , [$controller, ]); // TODO : Add signup function

$router->post('/api/wire', [$controller, ]); // TODO : Add wire function

$router->get('/api/profile/(\d+)', [$profile, 'getProfileById']);

$router->patch('/api/update', [$profile, 'updateProfile']);

$router->get('/api/trades/index/open', [$controller, ]); // TODO : Add getAllOpenTrades function

$router->get('/api/trades/index/closed', [$controller, ]); // TODO : Add getAllClosedTrades

$router->post('/api/openTrade', [$controller, ]); // TODO : Add buy function

$router->post('/api/closeTrade/(\d+)', [$controller, ]); // TODO : Add close function

$router->get('/api/closedPNL', [$controller, ]); // TODO : Add getTotalClosedTrades function

$router->get('/api/openPNL', [$controller, ]); // TODO : Add getTotalOpenTrades function

$router->get('/api/currentBalance', [$controller, ]); // TODO : Add getCurrentBalance function