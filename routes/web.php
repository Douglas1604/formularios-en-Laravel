<?php

use App\Http\Controllers\Crudcontroller;
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

Route :: get("/",[Crudcontroller::class,"index"])->name("crud.index");

// ruta añadir cliente
Route :: post("/registrar-cliente",[Crudcontroller::class,"create"])->name("crud.create");

// ruta modificar cliente
Route :: post("/modificar-cliente",[Crudcontroller::class,"update"])->name("crud.update");

// ruta eliminar cliente
Route :: get("/eliminar-cliente-{id}",[Crudcontroller::class,"delete"])->name("crud.delete");