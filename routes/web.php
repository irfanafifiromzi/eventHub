<?php

use App\Http\Controllers\EventsController;
use App\Http\Controllers\StripeController;
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

/*Search*/
Route::get('/search', [EventsController::class, 'search'])->name('search');

/*Event Description page*/
Route::get('/events/{events}', [EventsController::class, 'show'])->name('events.show');

/*Payment gateway*/
Route::post('/session', [StripeController::class, 'session'])->name('session')->middleware('auth');
Route::get('/success', [StripeController::class, 'success'])->name('success');


/*Log out*/
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

/*Organization*/
Route::get('/organization', [OrganizationController::class, 'organization'])->name('organizationhome');
Route::middleware(['auth'])->group(function () {
    Route::get('/organization/manageEvent', [OrganizationController::class, 'showEvent'])->name('organization.showEvent');
});

/*Create Event*/
Route::get('/organization/manageEvent/createEvent', [OrganizationController::class, 'createEventForm'])->name('organization.createEvent');
Route::middleware(['auth'])->group(function () {
Route::post('/createEvent', [OrganizationController::class, 'createEvent'])->name('organization.insertEvent');
});

/* Edit Event */
Route::get('/getEvent/{id}', [OrganizationController::class, 'getEvent'])->name('organization.getEvent');
Route::post('/updateEvent/{id}', [OrganizationController::class, 'updateEvent'])->name('organization.updateEvent');

/* Delete Event */
Route::get('/deleteEvent/{id}', [OrganizationController::class, 'deleteEvent'])->name('organization.deleteEvent');

/* Liked */
//Route::post('/like/event/{event}', [EventsController::class, 'likeEvent'])->name('like.event');




Route::get('/musicEvent', function () {
    return view('musicEvent', [
        "eventName" => "HausBoom Concert",
        "date" => "2-06-2024",
    ]);
});

Route::get('/artsEvent', function () {
    return view('artsEvent');
});

