<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcademicianController;
use App\Http\Controllers\GrantController;
use App\Http\Controllers\MilestoneController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('academicians', AcademicianController::class);
Route::resource('grants', GrantController::class);
Route::resource('milestones', MilestoneController::class);

Route::middleware(['can:AdminAcademicianStaff'])->group(function () {
    // Admin routes to manage academicians
    Route::resource('academicians', AcademicianController::class);
    Route::resource('grants', GrantController::class);
    Route::resource('milestones', MilestoneController::class);
});

Route::get('/grants/{grant}', [GrantController::class, 'show'])->name('grants.show');

/*Route::middleware(['auth'])->group(function () {
    Route::get('/grants/{grant}', [GrantController::class, 'show'])
        ->middleware('can:isMember,grant');

    Route::get('/grants/{grant}/edit', [GrantController::class, 'edit'])
        ->middleware('can:isLeader,grant');

});*/