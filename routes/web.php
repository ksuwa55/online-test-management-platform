<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReqController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\TasksController;


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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/requirements', [ReqController::class, 'index'])->name('requirements');
Route::resource('requirements',ReqController::class);

Route::resource('tasks',TasksController::class);

Route::get('/tasklist', function(){
    return view('tasks/tasklist');
})->name('tasklist');


Route::get('/testcase', function () {
    return view('testcase');
})->name('testcase');


Route::resource('upload',UploadController::class);

require __DIR__.'/auth.php';


