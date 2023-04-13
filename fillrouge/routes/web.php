<?php

use App\Http\Controllers\CompaignController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Models\Compaign;

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

Route::get('/', [CompaignController::class , 'index'] )->name('home');

Route::get('/donation', [CompaignController::class , 'donation'] )->name('donation');
Route::get('compaigns/{compaign:slug}', [CompaignController::class, 'show']);


Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard',  function () {
        
        return view('dashboard.dashboard', [
            'compaigns' => Auth::user()->compaigns,
        ]);} )->name('dashboard');
    
        Route::view('dashboard/create', 'dashboard.create')->name('dashboard.create');

        Route::post('/dashboard/dashboard', [CompaignController::class, 'store']);
            // Route::delete('/dashboard', [ProfileController::class, 'create'])->name('dashboard.create');
});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

require __DIR__.'/auth.php';