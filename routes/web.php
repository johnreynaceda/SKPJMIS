<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\WebcamController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Staff;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/visitor-profiling', function () {
    return view('pages.visitor-profiling');
})->name('visitor-profiling');

Route::get('/set-schedule', function () {
    return view('pages.set-schedule');
})->name('set-schedule');

Route::post('/save-image', [UploadController::class, 'upload'])->name('upload');

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
Route::prefix('admin')->middleware(['auth', 'verified', Admin::class])->group(function () {
    Route::get('dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('inmates', function () {
        return view('admin.inmates');
    })->name('admin.inmates');
    Route::get('inmates/{id}', function () {
        return view('admin.inmates-information');
    })->name('admin.inmates-information');
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
    Route::get('events', function () {
        return view('admin.events');
    })->name('admin.events');
    Route::get('actions', function () {
        return view('admin.actions');
    })->name('admin.actions');
    Route::get('reports', function () {
        return view('admin.reports');
    })->name('admin.reports');
    Route::get('create-user', function () {
        return view('admin.create-user');
    })->name('admin.create-user');
});

//staff routes
Route::prefix('staff')->middleware(['auth', 'verified', Staff::class])->group(function () {
    Route::get('dashboard', function () {
        return view('staff.dashboard');
    })->name('staff.dashboard');
    Route::get('inmates', function () {
        return view('staff.inmates');
    })->name('staff.inmates');
    Route::get('inmate-description/{id}', function () {
        return view('staff.inmate-description');
    })->name('staff.inmate-description');
    Route::get('inmates/create', function () {
        return view('staff.inmate-create');
    })->name('staff.inmate-create');
    Route::get('visitor', function () {
        return view('staff.visitor');
    })->name('staff.visitor');
    Route::get('crime', function () {
        return view('staff.crime');
    })->name('staff.crimes');
    Route::get('actions', function () {
        return view('staff.actions');
    })->name('staff.actions');
    Route::get('cell', function () {
        return view('staff.cell');
    })->name('staff.cell');
    Route::get('cell/{id}', function () {
        return view('staff.cell-inmate');
    })->name('staff.cell-inmate');
    Route::get('events', function () {
        return view('staff.events');
    })->name('staff.events');
    Route::get('events/{id}', function () {
        return view('staff.event-attendance');
    })->name('staff.event-attendance');
    Route::get('reports', function () {
        return view('staff.reports');
    })->name('staff.reports');
    Route::get('attendance', function () {
        return view('staff.attendance');
    })->name('staff.attendance');
    Route::get('inmates/{id}', function () {
        return view('staff.inmates-information');
    })->name('staff.inmates-information');
});

//staff routes

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
