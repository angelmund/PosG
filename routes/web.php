<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Livewire\Categoria\CategoriaComponente;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

//Ruta raiz
Route::get('/', function () {
    return view('auth.login');
});

//ruta dasboard o menú principal
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//rutas de perfil 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//rutas para control de usuarios 
Route::group(['middleware' => ['auth']], function(){
    Route::get('/usuarios', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
})->middleware(['auth', 'verified'])->name('usuarios');

//rutas de ventas  **cambiar el controlador ***
Route::group(['middleware' => ['auth']], function(){
    Route::get('/ventas', [App\Http\Controllers\VentaController::class, 'index'])->name('ventas.index');
})->middleware(['auth', 'verified'])->name('ventas');

//Ruta medidas 
Route::group(['middleware' => ['auth']], function(){
    Route::get('/medidas', [App\Http\Controllers\MedidaController::class, 'index'])->name('medidas.index');
    // Route::get('/medidas/nuevamedida', [App\Http\Controllers\MedidaController::class, 'create'])->name('medidas.nueva');
    Route::post('/medidas/createmedida', [App\Http\Controllers\MedidaController::class, 'store'])->name('medidas.create');
    Route::get('/medidas/editmedida/{idmedida}', [App\Http\Controllers\MedidaController::class, 'show'])->name('medidas.edit');
    Route::post('/medidas/updatemedida/{idmedida}', [App\Http\Controllers\MedidaController::class, 'update'])->name('medidas.update');
    // Route::get('/categorias', CategoriaComponente::class)->name('');

    // Route::get('/ruta-del-archivo-js', [App\Http\Controllers\MedidaController::class, 'activarformulario']);
    // Route::resource('medidas', App\Http\Controllers\MedidaController::class);

})->middleware(['auth', 'verified'])->name('medidas');

//Ruta medidas 
Route::group(['middleware' => ['auth']], function(){
    Route::get('/categorias', [App\Http\Controllers\CategoriaController::class, 'index'])->name('categorias.index');
    Route::post('/categorias/createcategoria', [App\Http\Controllers\CategoriaController::class, 'store'])->name('categorias.create');
    Route::get('/categorias/editcategoria/{idcategoria}', [App\Http\Controllers\CategoriaController::class, 'show'])->name('categorias.edit');
    Route::post('/categorias/updatecategoria/{idcategoria}', [App\Http\Controllers\CategoriaController::class, 'update'])->name('categorias.update');
})->middleware(['auth', 'verified'])->name('categorias');



require __DIR__.'/auth.php';
