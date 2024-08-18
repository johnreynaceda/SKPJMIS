<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
   switch (auth()->user()->user_type) {
    case 'admin':
        return redirect()->route('admin.dashboard');
    case 'staff':
        return redirect()->route('staff.dashboard');

    default:
        # code...
        break;
   }
})->middleware(['auth', 'verified'])->name('dashboard');

//admin routes
Route::prefix('admin')->middleware(['auth', 'verified'])->group(function(){
    Route::get('dashboard', function () {
       return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('inmates', function () {
       return view('admin.inmates');
    })->name('admin.inmates');
    Route::get('inmates/create', function () {
       return view('admin.inmates-create');
    })->name('admin.inmates-create');
    Route::get('crimes', function () {
       return view('admin.crimes');
    })->name('admin.crimes');
    Route::get('visitor', function () {
       return view('admin.visitor');
    })->name('admin.visitor');
    Route::get('cell-block', function () {
       return view('admin.cell');
    })->name('admin.cell');
    Route::get('users', function () {
       return view('admin.users');
    })->name('admin.users');
});

//staff routes
Route::prefix('staff')->middleware(['auth', 'verified'])->group(function(){
    Route::get('dashboard', function () {
       return view('staff.dashboard');
    })->name('staff.dashboard');
    Route::get('visitor', function () {
       return view('staff.visitor');
    })->name('staff.visitor');
});



//staff routes

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
