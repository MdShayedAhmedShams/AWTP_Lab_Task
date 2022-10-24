<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServicesController;
use App\Http\Middleware\ValidateLogin;
use App\Http\Middleware\ValidAdmin;

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

Route::get('/', function () {return view('home');})->name('home');

Route::get('/aboutUs',[PagesController::class, 'aboutUs'])->name('aboutUs');

Route::get('/contactUs',[PagesController::class, 'contactUs'])->name('contactUs');

Route::get('/ourTeams',[PagesController::class, 'ourTeams'])->name('ourTeams');

Route::get('/login',[PagesController::class, 'login'])->name('login');
Route::post('/login',[PagesController::class, 'loginSubmit'])->name('loginSubmit');
Route::get('/logout',[PagesController::class, 'logout'])->name('logout');

Route::get('/registration',[PagesController::class, 'register'])->name('register');
Route::post('/registration',[PagesController::class, 'registerSubmit'])->name('registerSubmit');

Route::get('/admin/dashboard',[AdminController::class, 'aDashboard'])->name('aDashboard')->middleware('ValidAdmin');

Route::get('/customer/dashboard',[CustomerController::class, 'cDashboard'])->name('cDashboard')->middleware('ValidateLogin');
Route::post('/customer/dashboard',[CustomerController::class, 'cDashboardSubmit'])->name('cDashboardSubmit')->middleware('ValidateLogin');

Route::get('/customer/customerEdit/{id}',[CustomerController::class, 'customerEditId'])->name('customerEditId')->middleware('ValidAdmin');
Route::get('/customer/customerEdit',[CustomerController::class, 'customerEdit'])->name('customerEdit')->middleware('ValidAdmin');
Route::post('/customer/customerEdit',[CustomerController::class, 'customerEditSubmit'])->name('customerEditSubmit')->middleware('ValidAdmin');

Route::get('/admin/customerDelete/{id}',[CustomerController::class, 'customerDelete'])->name('customerDelete')->middleware('ValidAdmin');
