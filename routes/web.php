<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPostController;
use App\Http\Controllers\JobAppController;

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

Auth::routes();

Route::middleware(['auth'])->group(function() {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // jobpost Routes
    Route::get('jobpost', [JobPostController::class, 'index'])->name('jobpost.index');
    Route::resource('jobpost',JobPostController::class );
    Route::get('/jobpost/{jobpost}/{jobapp?}', [JobPostController::class, 'show'])->name('jobpost.show');
    Route::get('/jobpost/create/', [JobPostController::class, 'create'])->name('jobpost.create');
    Route::get('jobpost/{jobpost}/edit', [JobPostController::class, 'edit'])->name('jobpost.edit');
    Route::put('jobpost/{jobpost}', [JobPostController::class, 'update'])->name('jobpost.update');
    Route::delete('jobpost/{jobpost}', [JobPostController::class, 'destroy'])->name('jobpost.destroy');
    Route::get('jobpost', [JobPostController::class, 'in    dexing'])->name('jobpost.indexing');

    //jobapp routes
    Route::get('/jobapp/show/{jobpost}/{jobapp}', [JobAppController::class, 'show'])->name('jobapp.show');
    Route::get('/jobapp/allshow/{jobpost}', [JobAppController::class, 'allshow'])->name('jobapp.allshow');
    Route::get('/jobapp/create/{jobpost}', [JobAppController::class, 'create'])->name('jobapp.create');
    Route::post('/jobapp/store', [JobAppController::class, 'store'])->name('jobapp.store');
    Route::put('/jobapp/{jobpost}/{jobapp}', [JobAppController::class, 'update'])->name('jobapp.update');
    Route::get('jobapp/{jobpost}/{jobapp}/edit', [JobAppController::class, 'edit'])->name('jobapp.edit');

});
