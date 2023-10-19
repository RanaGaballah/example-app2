<?php

use App\Http\Controllers\FirstController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::get('/', [FirstController::class,'first']);


Route::get('index',function(){
return view('index');
});

Route::get('index2',function(){
    return view('index2');
    });
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('/redirect/{service}',[FirstController::class,'redirect']);

Route::get('/callback/{service}',[FirstController::class,'callback']);



Route::group(
    [
        'prefix' =>LaravelLocalization::setLocale(), 
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ],function(){
        Route::get('/', [FirstController::class,'first']);


        Route::group(['prefix' => 'offers'],function(){

            Route::get('create',[FirstController::class,'create']);
            Route::post('store',[FirstController::class,'store'])->name('offer.store');


    });
    
   
    
    

});