<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Product\ViewController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Product\CreateController;
use App\Http\Controllers\Product\UpdateController;
use App\Http\Controllers\Product\DeleteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => 'auth:sanctum', 'prefix' => 'products', 'name' => 'products'],
    static function (\Illuminate\Routing\Router $router) {
        $router->post('/', CreateController::class);
        $router->get('/{id}', ViewController::class)->whereNumber('id');
        $router->put('/{id}', UpdateController::class)->whereNumber('id');
        $router->delete('/{id}', DeleteController::class)->whereNumber('id');
    });

Route::post('/register', RegisterController::class);
Route::post('/login', LoginController::class);

