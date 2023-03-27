<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenerosController;
use App\Http\Controllers\PeliculasController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\FuncionesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {return view('index'); })->name('inicio');;

// Route::get('/menu', function () { return view('menu');})->name('menu');;

Route::get('/pelicula', function () { return view('pelicula');})->name('pelicula');;

// Route::get('/historial', function () { return view('historial');})->name('historial');;

Route::get('/agregarPelicula', function () { return view('agregarPelicula');})->name('agregarPelicula');;

// Route::get('/generos', function () { return view('generos');})->name('generos');

//Peliculas
Route::get('/peliculas', [PeliculasController::class, 'index'])->name('peliculas.index');
Route::get('/pelicula/{id}', [PeliculasController::class, 'pelicula'])->name('peliculas.pelicula');
Route::get('/peliculas/create', [PeliculasController::class, 'create'])->name('peliculas.create');
Route::post('/peliculas/create', [PeliculasController::class, 'store'])->name('peliculas.store');
Route::get('/peliculas/{id}/edit', [PeliculasController::class, 'edit'])->name('peliculas.edit');
Route::put('/peliculas/{id}/edit', [PeliculasController::class, 'update'])->name('peliculas.update');
Route::put('/peliculas/{id}', [PeliculasController::class, 'destroy'])->name('peliculas.destroy');

//Usuarios
Route::get('/usuarios/create', [UsuariosController::class, 'index'])->name('usuarios.create');
Route::post('/usuarios/create', [UsuariosController::class, 'store'])->name('usuarios.store');
Route::get('/usuarios/{id}/edit', [UsuariosController::class, 'edit'])->name('usuarios.edit');
Route::put('/usuarios/{id}/edit', [UsuariosController::class, 'update'])->name('usuarios.update');
Route::put('/usuarios/{id}', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');


//Generos
Route::get('/generos', [GenerosController::class, 'index'])->name('generos.index');
Route::post('/generos', [GenerosController::class, 'store'])->name('generos.store');
Route::get('/generos/{id}/edit', [GenerosController::class, 'edit'])->name('generos.edit');
Route::put('/generos/{id}/edit', [GenerosController::class, 'update'])->name('generos.update');
Route::put('/generos/{id}', [GenerosController::class, 'destroy'])->name('generos.destroy');

//Funciones
Route::get('/historial', [FuncionesController::class, 'index'])->name('funciones.index');
Route::post('/pelicula/{id}', [FuncionesController::class, 'store'])->name('funciones.store');
Route::get('/funciones/{id}/edit', [FuncionesController::class, 'edit'])->name('funciones.edit');
Route::put('/funciones/{id}/edit', [FuncionesController::class, 'update'])->name('funciones.update');
Route::put('/funciones/{id}', [FuncionesController::class, 'destroy'])->name('funciones.destroy');
