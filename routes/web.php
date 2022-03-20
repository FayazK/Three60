<?php

use App\Http\Controllers\Generate\PasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get( '/', function() {
    return inertia( 'welcome' );
} );

Route::get( 'test', function() {
    return inertia( 'test' );
} );

Route::prefix( 'generate' )->group( function() {
    Route::get( 'simple-password', [ PasswordController::class, 'simple' ] );
} );
