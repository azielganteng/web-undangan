<?php

use App\Http\Controllers\InvitationController;
use App\Http\Controllers\LandingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landing');
Route::post('/testimonial', [LandingController::class, 'storeTestimonial'])
    ->middleware('throttle:10,1')
    ->name('testimonial.store');
Route::get('/demo/{slug}', [InvitationController::class, 'show'])->name('demo.show');
Route::post('/demo/{slug}/wish', [InvitationController::class, 'storeWish'])
    ->middleware('throttle:20,1')
    ->name('demo.wish');
