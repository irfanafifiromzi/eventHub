<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrganizationController;
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

/*Home*/ 
Route::get('/', [EventsController::class, 'index'])->name('home');

/*Auth*/
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginProcess', [AuthController::class, 'loginProcess'])->name('loginProcess');

Route::get('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/signupUser', [AuthController::class, 'signupUser'])->name('signupUser');

/*Log out*/
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/*Organization*/
Route::get('/organization', [OrganizationController::class, 'index'])->name('organizationhome');

/*Event Description page*/
Route::get('/events/{events}', [EventsController::class, 'show'])->name('events.show');

Route::get('/musicEvent', function () {
    return view('musicEvent', [
        "eventName" => "HausBoom Concert",
        "date" => "2-06-2024",
    ]);
});

Route::get('/artsEvent', function () {
    return view('artsEvent');
});

