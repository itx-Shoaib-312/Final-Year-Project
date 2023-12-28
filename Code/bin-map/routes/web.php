<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AnalyticsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Route::get('/register', [HomeController::class, 'register']);
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/register', [HomeController::class, 'register']);
Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics');
Route::post('/home', [HomeController::class, 'store'])->name('bins.store');
Route::delete('/bins/{id}', [HomeController::class, 'deleteBin'])->name('bins.delete');
Route::post('/send-email', [AnalyticsController::class, 'sendEmail'])->name('send-email');


// Route::match(['get', 'post'], '/home', function () {
//     // Handle the GET and POST requests here
//     return view('home');
// });
// Route::get('/home', 'HomeController@index')->name('home');