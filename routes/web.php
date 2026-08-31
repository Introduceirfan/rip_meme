<?php

use App\Http\Controllers\MemeController;
use App\Models\Meme;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('memes/export', [MemeController::class, 'export'])->name('memes.export');
Route::post('memes/import', [MemeController::class, 'import'])->name('memes.import');
Route::get('memes/template', [MemeController::class, 'template'])->name('memes.template');
Route::resource('memes', MemeController::class);
