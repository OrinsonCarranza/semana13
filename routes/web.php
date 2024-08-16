<?php

// use App\Http\Controllers\PersonaController;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\ContactoController;
// // use App\Http\Controllers\ServiciosController; // Asegúrate de importar el controlador correcto

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/personas', [PersonaController::class, 'index'])->name('personas.index');
// Route::get('/personas/create', [PersonaController::class, 'create'])->name('personas.create');
// Route::post('/personas', [PersonaController::class, 'store'])->name('personas.store');
// Route::get('/personas/{persona}/edit', [PersonaController::class, 'edit'])->name('personas.edit');
// Route::put('/personas/{persona}', [PersonaController::class, 'update'])->name('personas.update');
// Route::delete('/personas/{persona}', [PersonaController::class, 'destroy'])->name('personas.destroy');

// Route::get('/contacto', function () {
//     return view('contacto');
// })->name('contacto');

// Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');

// // Agrega esta línea para las rutas de servicios
// Route::resource('personas', 'PersonaController')
//     ->names('personas'); 
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ServiciosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//---------MIDDLEWARE A RUTA, PERO BASTA CON QUE NO PUEDA EDITAR NI ELIMINAR SIN ANTES HABERSE LOGUEADO
// Route::get('/', function () {
//     return view('welcome');
// })->middleware('auth'); 

// Usamos Route::resource para definir todas las rutas RESTful para personas
Route::resource('personas', PersonaController::class);

// Ruta para la página de contacto
Route::get('/contacto', function () {
    return view('contacto');
})->name('contacto');

// Ruta para manejar el envío del formulario de contacto
Route::post('/contacto', [ContactoController::class, 'store'])->name('contacto.store');

// Ruta resource para el controlador Servicios
Route::resource('servicios', ServiciosController::class)->names('servicios');


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
