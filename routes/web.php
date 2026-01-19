<?php

use App\Http\Controllers\CategoryController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Curso;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $cursos=Curso::with('category', 'user')->where('disponible', 'SI')->paginate(5);
    return view('welcome', compact('cursos'));
})->name('inicio');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('categories', CategoryController::class)->except('show')->middleware(AdminMiddleware::class);
});
