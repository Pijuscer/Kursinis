<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogCareController;
use App\Http\Controllers\PricesController;
use App\Http\Controllers\CareController;
use App\Http\Controllers\WorkingDayController;

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
Route::get('/about', function () {
    return view('about');
});

Route::get('/welcome_email', function () {
    return view('welcome_email');
});

Route::get('/dog_care', [DogCareController::class, 'index']);

Route::get('/add_dog_care', [DogCareController::class, 'viewForm']);
Route::post('/add_dog_care', [DogCareController::class, 'store']);
Route::get('/dog_care/edit/{id}', [DogCareController::class, 'editForm']);
Route::post('/dog_care/edit/{id}', [DogCareController::class, 'edit']);
Route::get('/dog_care/remove/ask/{id}', [DogCareController::class, 'removeForm']);
Route::get('/dog_care/remove/{id}', [DogCareController::class, 'remove']);
Route::get('/dog_care/search', [DogCareController::class, 'search']);


Route::get('/prices', [PricesController::class, 'viewForm1']);
Route::post('/prices', [PricesController::class, 'store']);
Route::get('/add_prices', [PricesController::class, 'index']);
Route::get('/add_prices/edit/{id}', [PricesController::class, 'editForm']);
Route::post('/add_prices/edit/{id}', [PricesController::class, 'edit']);
Route::get('/add_prices/remove/ask/{id}', [PricesController::class, 'removeForm']);
Route::get('/add_prices/remove/{id}', [PricesController::class, 'remove']);

//Route::get('/add_prices', [PricesController::class, 'index']);
Route::get('/cares', [CareController::class, 'viewForm']);
Route::post('/cares', [CareController::class, 'store']);
Route::get('/add_cares', [CareController::class, 'index']);
Route::get('/add_cares/edit/{id}', [CareController::class, 'editForm']);
Route::post('/add_cares/edit/{id}', [CareController::class, 'edit']);
Route::get('/add_cares/remove/ask/{id}', [CareController::class, 'removeForm']);
Route::get('/add_cares/remove/{id}', [CareController::class, 'remove']);

Route::get('/working_days', [WorkingDayController::class, 'viewForm']);
Route::post('/working_days', [WorkingDayController::class, 'store']);
Route::get('/working_days', [WorkingDayController::class, 'index']);
Route::get('/working_days/edit/{id}', [WorkingDayController::class, 'editForm']);
Route::post('/working_days/edit/{id}', [WorkingDayController::class, 'edit']);
Route::get('/working_days/remove/ask/{id}', [WorkingDayController::class, 'removeForm']);
Route::get('/working_days/remove/{id}', [WorkingDayController::class, 'remove']);
Route::get('/working_days/search', [WorkingDayController::class, 'search']);
Route::get('/order_care/search2', [WorkingDayController::class, 'search2']);
Route::get('/order_care', [WorkingDayController::class, 'index2']);

///Route::get('/order_care', function () {
   // return view('order_care');
//});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
