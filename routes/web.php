<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Middleware\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('reports.index');
});

Route::get('/dashboard', function () {
    return redirect()->route('reports.index');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/create', function () {
        return view('report.create');
    })->name('reports.create');
    Route::delete('/reports/{report}', [ReportController::class, 'destroy'])->name('reports.destroy');
    Route::post('/reports', [ReportController::class, 'store'])->name('reports.store');
    Route::get('/reports/{report}/edit', [ReportController::class, 'edit'])->name('reports.edit');
    Route::put('/reports/{report}', [ReportController::class, 'update'])->name('reports.update');
});

Route::middleware((Admin::class))->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::patch('/reports/status/{report}/', [ReportController::class, 'statusUpdate'])->name('reports.status.update');
});



require __DIR__ . '/auth.php';
