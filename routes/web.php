<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\RegistrationWizard;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Registration\StudentInformation;

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

Route::redirect('/', '/login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['prefix' => 'registration', 'middleware' => 'auth'], function(){

    Route::get('/', RegistrationWizard::class)->name('registration-wizard');
    Route::get('/student', StudentInformation::class);
});

require __DIR__.'/auth.php';
