<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReqController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TestcaseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TestcaseInReqController;

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

//Welcome page
Route::get('/', function () {
    return view('welcome');
});

Route::resource('register_project',ProjectController::class);


//Dashboard
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');


//Requirements
Route::get('requirements/{id}', [ReqController::class, 'display'])->name('requirements.display');

Route::resource('requirements',ReqController::class);



//Calendar
Route::resource('calendar',CalendarController::class);

//Tasklist
Route::resource('tasks',TaskController::class);

//Test case
// Route::get('/testcases', [TestcaseController::class, 'update_status'])->name('testcases.update_status');
Route::resource('testcases',TestcaseController::class);

//File upload
Route::resource('upload',UploadController::class);

require __DIR__.'/auth.php';


