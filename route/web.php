<?php

use src\Route;
$route = Route::getInstance();
$route->setRoute('dashboard',\modules\admin\dashboard\controllers\DashboardController::class,'index');
$route->setRoute('logout',\modules\admin\login\controllers\AuthController::class,'logout');
$route->setRoute('login',\modules\admin\login\controllers\AuthController::class,'login');