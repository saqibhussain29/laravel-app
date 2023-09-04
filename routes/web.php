<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Authcontroller;
use App\Http\Controllers\EditController;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\UserController;

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

Route::get('login', [Authcontroller::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::get('register', [Authcontroller::class, 'register_view'])->name('register');
Route::post('register', [Authcontroller::class, 'register'])->name('register');
Route::get('logout', [Authcontroller::class, 'logout'])->name('logout');
Route::middleware(['auth'])->group(function () {

    Route::get('home', [StudentController::class, 'search'])->name('home');
    Route::get('student', [StudentController::class, 'create'])->name('student');
    Route::post('student', [StudentController::class, 'studentvalid'])->name('student');
    Route::get('search', [StudentController::class, 'search'])->name('search');
    Route::get('show{id}', [StudentController::class, 'update'])->name('show');
    Route::put('show/{id}', [StudentController::class, 'edit'])->name('show');
    Route::get('deletes{id}', [StudentController::class, 'remove'])->name('deletes');
    Route::get('detail{id}', [StudentController::class, 'detail'])->name('detail');
    // Making user controller for update and edit or delete   //   
    Route::get('/edit/{id}', [UserController::class, 'loginDetail'])->name('user.edit');
    Route::post('edit/{id}', [UserController::class, 'loginUpdate'])->name('edit');

    Route::get('/UserPassword/{id}', [UserController::class, 'passwordDetail'])->name('UserPassword');
    Route::post('UserPassword/{id}', [UserController::class, 'passwordUpdates'])->name('UserPassword');

    Route::get('delete{id}', [UserController::class, 'DeleteUser'])->name('delete');
    Route::post('/users/delete-multiple', [UserController::class, 'deleteMultiple'])->name('users.deleteMultiple');

    ///// middleware//////

    Route::get('/user{id}', [UserController::class, 'UserDetail'])->name('user');
    Route::middleware(['roles:Admin'])->group(function () {
        Route::get('UserHome', [UserController::class, 'UserShow'])->name('UserHome');
        Route::get('searches', [UserController::class, 'searches'])->name('searches');
        Route::get('/useredit/{id}', [UserController::class, 'loginDetails'])->name('useredit');
        Route::post('useredit/{id}', [UserController::class, 'loginUpdates'])->name('useredit');
        Route::get('/userstatus/{id}', [UserController::class, 'status'])->name('userstatus');
        
    });

    //////////////    working for  admin //////////////////
    route::get('admin', [AdminController::class, 'creates'])->name('admin');
    Route::post('admin', [AdminController::class, 'logins'])->name('admin');
});
