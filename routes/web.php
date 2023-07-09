<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\EmployeesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/

/*Route::get('/', function () {
    //return view('welcome');
    return view('App\Http\Controllers\DashboardController@index');
    //return view('dashboard.index');
});*/
Route::resource('/', CustomAuthController::class);
Route::resource('/dashboard', DashboardController::class);

//Route::get('companies/unLinkImage', 'CompaniesController@unLinkImage');
Route::get('/unLinkImage/', 'App\Http\Controllers\CompaniesController@unLinkImage')->name('unLinkImage');
Route::resource('companies', CompaniesController::class);
Route::resource('employees', EmployeesController::class);

Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom'); 
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom'); 
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');