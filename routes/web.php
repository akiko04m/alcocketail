<?php
use App\Http\Controllers\IncludeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CocktailController;
use App\Http\Controllers\RecipeController;
use Illuminate\Support\Facades\Route;

//処理が来た際にどこに渡すかの案内板

Route::get('/', function(){
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(ProfileController::class)->middleware(['auth'])->group(function () {
    Route::get('/profile', 'edit')->name('profile.edit');
    Route::patch('/profile','update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
});

Route::controller(IncludeController::class)->middleware(['auth'])->group(function () {
    Route::get('/include', 'index')->name('include.index');
    //name('include.index')はルーティングの名前
    Route::post('/include','sort');
    Route::get('/include/create','create')->name('include.create');
});

//middleware(['auth']):ログインしている人だけ使える
Route::controller(RecipeController::class)->middleware(['auth'])->group(function () {
    //Route::get('ルーティング', 'メソッド名')->name('include.recipe.create');
    Route::get('/recipe/create', 'recipe_create')->name('include.recipe.create');//クライアントサイド側でデータが欲しいよってときに使う
    Route::post('/recipe', 'edit');//何かデータを送りたいとき、送信したいとき、などに使う
});

Route::controller(CocktailController::class)->middleware(['auth'])->group(function () {
    Route::get('/cocktails', 'cocktail')->name('include.cocktail');//12/04
    // Route::get('/cocktails/create', 'cocktailcreate')->name('include.cocktail.create');//12/04
});

require __DIR__.'/auth.php';
