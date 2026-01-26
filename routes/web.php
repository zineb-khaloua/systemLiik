<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;



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

// Dashboard
// Route::get('/', function () {
//     return view('dashboard');
// })->name('dashboard');

// Access Control
Route::middleware( ['auth'])->group(function(){
Route::get('/', [DashboardController::class,'index'])->name('dashboard');
});

Route::middleware(['auth','permission:manage users'])->group(function(){

Route::get('/users', [UserController::class,'index'])->name('users.index');
Route::get('users/create',[UserController::class,'create'])->name('users.create');
Route::post('users/store',[UserController::class,'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

});


Route::middleware(['auth'])->group(function(){
Route::get('/settings', [UserController::class, 'settings'])->name('settings.index');
Route::get('/profile', [UserController::class, 'profile'])->name('profile.show');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::middleware(['auth','permission:manage roles'])->group(function(){
Route::get('/roles',[RoleController::class,'index'])->name('roles.index');
Route::get('/roles/create',[RoleController::class,'create'])->name('roles.create');
Route::post('/roles/store',[RoleController::class,'store'])->name('roles.store');
Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
Route::put('/roles/{role}', [RoleController::class, 'update'])->name('roles.update');
Route::delete('/roles/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
});





Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions.index');
Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
Route::post('/permissions', [PermissionController::class, 'store'])->name('permissions.store');
Route::get('/permissions/{permission}/edit', [PermissionController::class, 'edit'])->name('permissions.edit');
Route::put('/permissions/{permission}', [PermissionController::class, 'update'])->name('permissions.update');
Route::delete('/permissions/{permission}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

Route::get('/clients', function () {
    return view('clients.index');
})->name('clients.index');

Route::get('/clients/create', function () {
    return view('clients.create');
})->name('clients.create');

// Products
Route::get('/products', function () {
    return view('products.index');
})->name('products.index');

Route::get('/products/create', function () {
    return view('products.create');
})->name('products.create');

Route::get('/categories', function () {
    return view('categories.index');
})->name('categories.index');

// Commercial
Route::get('/orders', function () {
    return view('orders.index');
})->name('orders.index');

Route::get('/orders/create', function () {
    return view('orders.create');
})->name('orders.create');

Route::get('/quotes', function () {
    return view('quotes.index');
})->name('quotes.index');

Route::get('/invoices', function () {
    return view('invoices.index');
})->name('invoices.index');

// Procurement
Route::get('/purchases', function () {
    return view('purchases.index');
})->name('purchases.index');
