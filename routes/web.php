<?php

use App\Http\Controllers\PortariaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServidorController;
use Illuminate\Support\Facades\Route;

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
    $servidores = App\Models\Servidor::orderBy('nome')->get();
    return view('home.index', [
        'servidores' => $servidores,
    ]);
});

Route::get('/dashboard', function () {
    return redirect()->route('portaria.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/servidor', [ServidorController::class, 'index'])->name('servidor.index');
    Route::get('/servidor/create', [ServidorController::class, 'create'])->name('servidor.create');
    Route::post('/servidor/store', [ServidorController::class, 'store'])->name('servidor.store');
    Route::get('/servidor/{servidor}/edit', [ServidorController::class, 'edit'])->name('servidor.edit');
    Route::patch('/servidor/{servidor}', [ServidorController::class, 'update'])->name('servidor.update');
    Route::delete('/servidor/{servidor}', [ServidorController::class, 'destroy'])->name('servidor.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/portaria', [PortariaController::class, 'index'])->name('portaria.index');
    Route::get('/portaria/create', [PortariaController::class, 'create'])->name('portaria.create');
    Route::get('/portaria/{portaria}/edit', [PortariaController::class, 'edit'])->name('portaria.edit');
    Route::post('/portaria/store', [PortariaController::class, 'store'])->name('portaria.store');
    Route::patch('/portaria/{portaria}', [PortariaController::class, 'update'])->name('portaria.update');
    Route::delete('/portaria/{portaria}', [PortariaController::class, 'destroy'])->name('portaria.destroy');
});

require __DIR__ . '/auth.php';
