<?php

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

// Application controllers
Route::get('/',\App\Http\Controllers\Client\RandomAppController::class)->name('home')->middleware(['auth','home']);


Route::get('/new-application',\App\Http\Controllers\Application\CreateController::class)->name('new.application')->middleware('auth','client');
Route::get('/index', \App\Http\Controllers\Client\IndexController::class)->name('application.index')->middleware('auth', 'client');

Route::group(['prefix'=>'lawyer', 'middleware' => 'lawyer'], function (){
   Route::get('/show', \App\Http\Controllers\Lawyer\ShowController::class)->name('lawyer.show');
//   Route::post('/store', \App\Http\Controllers\Lawyer\StoreController::class)->name('lawyer.store');
   Route::get('/index', \App\Http\Controllers\Lawyer\IndexController::class)->name('lawyer.index');
});





//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
