<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/requirements', function(){
    return view('requirements');
})->name('requirements');

Route::get('/testcase', function(){
    return view('testcase');
})->name('testcase');

Route::get('/register_user', function(){
    return view('register_user');
})->name('register_user');

Route::get('/succeed_register_project', function(){
    return view('succeed_register_project');
})->name('succeed_register_project');

Route::get('/register_project', function(){
    return view('register_project');
});

Route::get('/login', function(){
    return view('login');
})->name('login');


Route::resource('project',ProjectController::class);
Route::resource('user',UserController::class);