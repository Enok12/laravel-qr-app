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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Only logged in users can view the below
Route::group(['middleware' => 'auth'],function(){

Route::resource('qrcodes', App\Http\Controllers\QrcodeController::class);
Route::resource('transactions', App\Http\Controllers\TransactionController::class);
Route::resource('users', App\Http\Controllers\UserController::class);
Route::resource('accounts', App\Http\Controllers\AccountController::class)->except(['show']);

Route::get('/accounts/show/{id?}',[App\Http\Controllers\AccountController::class, 'show'])->name('accounts.show');

Route::resource('accountHistories', App\Http\Controllers\AccountHistoryController::class);

//Only Moderators and Admins
Route::group(['middleware' => 'checkmoderator'],function(){
    Route::get('/users',[App\Http\Controllers\UserController::class, 'index'])->name('users.index');
});

//Only Admins
Route::resource('roles', App\Http\Controllers\RoleController::class)->middleware('checkadmin');
Route::post('/accounts/apply_for_payout',[App\Http\Controllers\AccountController::class, 'apply_for_payout'])->name('accounts.apply_for_payout');
Route::post('/accounts/mark_as_paid',[App\Http\Controllers\AccountController::class, 'mark_as_paid'])->name('accounts.mark_as_paid')->middleware('checkmoderator');

Route::get('/accounts',[App\Http\Controllers\AccountController::class, 'index'])
->name('accounts.index')->middleware('checkmoderator');

Route::get('/accounts/create',[App\Http\Controllers\AccountController::class, 'create'])
->name('accounts.create')->middleware('checkadmin');

Route::get('/accountHistories/create',[App\Http\Controllers\AccountHistoryController::class, 'create'])
->name('accountHistories.create')->middleware('checkadmin');


});


