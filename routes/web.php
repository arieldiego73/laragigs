<?php

use App\Http\Controllers\ListingController;
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
    Route::get('/listings/create', 'create'); // Show create form
    Route::post('/listings', 'store'); // Create a listing
    Route::get('/listings/{listing}/edit', 'edit'); // Show edit form
    Route::put('/listings/{listing}', 'update'); // Update listing
    Route::delete('/listings/{listing}', 'destroy'); // Delete listing
});
