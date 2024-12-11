<?php
use App\Http\Controllers\IncludeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CocktailController;
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

    Route::get('/include', [IncludeController::class, 'index'])->name('include.index');//name('include.index')はルーティングの名前
    Route::get('/cocktails', [CocktailController::class, 'cocktail'])->name('include.cocktail');//12/04

    Route::get('/cocktails/create', [CocktailController::class, 'cocktailcreate'])->name('include.cocktail.create');//12/04
    Route::get('/include/create', [IncludeController::class, 'create'])->name('include.create');
    Route::post('/include', [IncludeController::class, 'sort']);

});

require __DIR__.'/auth.php';
