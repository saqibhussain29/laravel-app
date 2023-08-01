<?php

use App\Http\Controllers\Authcontroller;
use Illuminate\Support\Facades\Route; 

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

Route::get('/', function () {
    return view('welcome');
         });




Route::get('login',[Authcontroller::class,'index'])->name('login');
Route::post('login',[Authcontroller::class,'login'])->name('login');
Route::get('register',[Authcontroller::class,'register_view'])->name('register');
Route::post('register',[Authcontroller::class,'register'])->name('register');
Route::get('logout',[Authcontroller::class,'logout'])->name('logout');  
Route::middleware(['auth'])->group(function () {
    Route::get('home',[Authcontroller::class,'home'])->name('home');    
});