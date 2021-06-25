<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReqController;
use App\Http\Controllers\UploadController;


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


//  Route::get('/requirements', function () {
//     return view('requirements');
// })->name('requirements');

Route::get('/testcase', function () {
    return view('testcase');
})->name('testcase');

Route::get('/gantt', function () {
    return view('gantt');
})->name('gantt');;

Route::resource('upload',UploadController::class);

require __DIR__.'/auth.php';
