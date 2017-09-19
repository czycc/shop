<?php

use Illuminate\Routing\Router;

Admin::registerHelpersRoutes();

Route::group([
    'prefix' => config('admin.prefix'),
    'namespace' => Admin::controllerNamespace(),
    'middleware' => ['web', 'admin'],
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('orders', OrderController::class);
    $router->resource('users', UserController::class);
    $router->resource('statistics', StatisticController::class);
    $router->resource('pvs', PvController::class);

});
