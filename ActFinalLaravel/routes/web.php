<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userControler;
use App\Http\Controllers\categoryControler;
use App\Http\Controllers\catalogControler;

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

//Landing page
Route::get('/', function () {
    return view('index');
})->name('inicio');;

//Ruta de registro
Route::get('/login', function () {
    return view('login');
})->name('login'); 

//Ruta del perfil de usuario
Route::get('/perfil', function () {
    return view('profile');
})->name('profile'); 

//Ruta de confirmacion de cierre de sessión
Route::get('/confirmar', function () {
    return view('confirmLogOut');
})->name('confirm'); 

//Ruta de la pagina de gestion de usuarios
Route::get('/gestUsr', function () {
    return view('userGest');
})->name('usrGest');

//Ruta para agregar usuarios
Route::get('/addUsr', function () {
    return view('registerUsr');
})->name('usersAdmin'); 

//Ruta para actualizar usuarios
Route::get('/updUsr', function () {
    return view('modUsr');
})->name('usersModAdmin'); 

//Ruta para eliminar usuarios
Route::get('/delUsr', function () {
    return view('delUsr');
})->name('usersDelAdmin'); 

//Ruta de la pagina de gestion de productos
Route::get('/gestProd', function () {
    return view('ProdGest');
})->name('prodGest');

//Ruta para agregar productos
Route::get('/addProd', function () {
    return view('registerProd');
})->name('prodAdmin'); 

//Ruta para actualizar productos
Route::get('/updProd', function () {
    return view('modProd');
})->name('prodModAdmin'); 

//Ruta para eliminar productos
Route::get('/delProd', function () {
    return view('delProd');
})->name('prodDelAdmin'); 

//Enlace con la pagina de gestion de categorias
Route::get('/category', function () {
    return view('catGest');
})->name('gestCategorias'); 

//Ruta para agregar categorias
Route::get('/addCate', function () {
    return view('registerCat');
})->name('catAdmin'); 

//Ruta para modificar categorias
Route::get('/updCate', function () {
    return view('modCat');
})->name('updateCatAdmin'); 

//Ruta para eliminar categorias
Route::get('/deleteCate', function () {
    return view('delCat');
})->name('deleteCatAdmin'); 

//Línea para introducir datos
Route::post('/', [userControler::class, 'store'])->name('users');

//Registro de usuarios del admin
Route::post('/registerUsr', [userControler::class, 'storeAdmin'])->name('addUser');

//Actualizacion de usuarios del admin
Route::post('/updateUsr', [userControler::class, 'updAdmin'])->name('updUser');

//Eliminacion de usuarios del admin
Route::post('/deleteUsr', [userControler::class, 'delAdmin'])->name('delUser');

Route::get('/productos', [catalogControler::class, 'returnDatos'])->name('productos');

Route::get('/productosUpd', [catalogControler::class, 'returnDatosUpd'])->name('productos2');

//Registro de productos del admin
Route::post('/registerProd', [catalogControler::class, 'addCatalog'])->name('addProd');

//Actualizacion de productos del admin
Route::post('/updateProd', [catalogControler::class, 'updCatalog'])->name('updProd');

//Eliminacion de productos del admin
Route::post('/deleteProd', [catalogControler::class, 'delCatalog'])->name('delProd');

//Registro de categorias del admin
Route::post('/registerCat', [categoryControler::class, 'createCat'])->name('addCat');

//Actualización de categorias del admin
Route::post('/updateCat', [categoryControler::class, 'modifyCat'])->name('updCat');

//Eliminación de categorias del admin
Route::post('/deleteCat', [categoryControler::class, 'deleteCat'])->name('delCat');

//Línea para iniciar session
Route::post('/iniciar_session', [userControler::class, 'logearse'])->name('inicia_session');

//Línea para volver al perfil
Route::get('/prof', [userControler::class, 'profile'])->name('perfil');

//Ruta que enlaza con la pagina de categorias
Route::get('/categorias', [categoryControler::class, 'category'])->name('categorias');

//Ruta que enlaza con la pagina de catalogo
Route::get('/catalogo', [catalogControler::class, 'catalog'])->name('catalogo');