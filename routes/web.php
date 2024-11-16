<?php
use App\Http\Controllers\IncludeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//処理が来た際にどこに渡すかの案内板

Route::get('/', function(){
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/include/create', [IncludeController::class, 'create'])->name('include.create');
    Route::post('/include', [IncludeController::class, 'sort']);
});

require __DIR__.'/auth.php';
