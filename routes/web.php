<?php

use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserController;
use App\Models\Listing;
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

Route::controller(ListingController::class)->group(function () {
    Route::get('/', 'index'); // All listing
    Route::get('/listing/{listing}', 'show'); // Single listing
    Route::get('/listings/manage', 'manage')->middleware('auth'); // Manage listings
    Route::get('/listings/create', 'create')->middleware('auth'); // Show create form
    Route::post('/listings', 'store')->middleware('auth'); // Create a listing
    Route::get('/listings/{listing}/edit', 'edit')->middleware('auth'); // Show edit form
    Route::put('/listings/{listing}', 'update')->middleware('auth'); // Update listing
    Route::delete('/listings/{listing}', 'destroy')->middleware('auth'); // Delete listing
});

Route::controller(UserController::class)->group(function () {
    Route::post('/users', 'store'); // Create a new user
    Route::get('/register', 'register')->middleware('guest'); // Show registration page
    Route::get('/login', 'login')->name('login')->middleware('guest'); // Show login page
    Route::post('/logout', 'logout')->middleware('auth'); // Log user out
    Route::post('/users/authenticate', 'authenticate'); // Log user in
});
