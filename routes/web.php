<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/send-email', [EmailController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/dashboard', [ProfileController::class, 'index'])->name('dashboard');
    Route::get('/employees', [ProfileController::class, 'show'])->name('employees');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('edit/{employee}', [ProfileController::class, 'editemployee'])->name('editemployee');
    Route::put('updateemployee/{employee}', [ProfileController::class, 'updateemployee'])->name('updateemployee');
    Route::delete('deleteemployee/{employee}', [ProfileController::class, 'deleteemployee'])->name('deleteemployee');

    Route::get('/createemployee', [ProfileController::class, 'createemployee'])->name('createemployee');
    Route::post('/storeemployee', [ProfileController::class, 'storeemployee'])->name('storeemployee');

    Route::get('/createsalary', [ProfileController::class, 'createsalary'])->name('createsalary');
    Route::post('/storesalary', [ProfileController::class, 'storesalary'])->name('storesalary');
    // Route::get('/dashboard', [ProfileController::class, 'salarydetails'])->name('salarydetails');
});

require __DIR__.'/auth.php';
