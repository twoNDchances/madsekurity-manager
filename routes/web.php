<?php

use App\Http\Controllers\DefenderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::name('manager.')
->prefix(Env::get('MANAGER_ADMIN_PATH_PREFIX', 'manager'))
->group(function ()
{
    Route::name('defenders.')
    ->prefix('defenders')
    ->group(function ()
    {
        Route::get('inspect/{id}', [DefenderController::class, 'inspect'])->name('inspect');
    });
    Route::get('verify/{email}/{token}', [UserController::class, 'verify'])->name('verify');
});
