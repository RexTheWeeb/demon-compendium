<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemonController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [UserController::class, 'show'])->name('users.profile');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/contact', function () {
    $email = "dummyname@dummymail.com";
    return view('contact', ['email' => $email]);
})->name('contact');

Route::get('/opening/{test}', function (string $testNaam) {
    return view('test', ['test' => $testNaam]);
});

Route::get('/demons', [DemonController::class, 'index'])->name('demons.index');
Route::middleware(['auth'])->group(function () {
    Route::get('/demons/create', [DemonController::class, 'create'])->name('demons.create');
    Route::post('/demons/store', [DemonController::class, 'store'])->name('demons.store');
    Route::patch('demons/{demon}/toggle-visibility', [DemonController::class, 'toggleVisibility'])->name('demons.toggleVisibility');
});
Route::get('/demons/{demon}', [DemonController::class, 'show'])->name('demons.show');
Route::get('demons/{demon}/edit', [DemonController::class, 'edit'])->name('demons.edit');
Route::put('demons/{demon}', [DemonController::class, 'update'])->name('demons.update');
Route::delete('/demons/{demon}', [DemonController::class, 'destroy'])->name('demons.destroy');


require __DIR__ . '/auth.php';
