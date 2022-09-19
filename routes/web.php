<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class, 'index'])->name('home');




Route::middleware(['admin'])->group(function () {
    Route::match(['get', 'post'], '/usuarios', [UserController::class, 'usuarios'])->name("usuario");

    Route::match(['get', 'post'], '/produtos', [ProductController::class, 'produto'])->name("produto");
    Route::match(['get', 'post'], '/criar_produto', [ProductController::class, 'createProduct'])->name("criar_produto");
    Route::match(['get', 'post'], '/criar', [ProductController::class, 'store'])->name("store_product");
    Route::match(['get', 'post'], '/editar/produto/{id}', [ProductController::class, 'editProduto'])->name("editProduto");
    Route::put('/editar/produto/{id}', [ProductController::class, 'update']);
    Route::delete('/deletar/produto/{id}', [ProductController::class, 'destroy']);


    Route::match(['get', 'post'], '/categorias', [CategoryController::class, 'categoria'])->name("categoria");
    Route::match(['get', 'post'], '/criar_categoria', [CategoryController::class, 'create'])->name("criar_categoria");
    Route::match(['get', 'post'], '/store_cat', [CategoryController::class, 'store'])->name("store_cat");
    Route::match(['get', 'post'], '/editar/categoria/{id}', [CategoryController::class, 'edit'])->name("edit_categoria");
    Route::put('/editar/categoria/{id}', [CategoryController::class, 'update']);
    Route::delete('/deletar/categoria/{id}', [CategoryController::class, 'destroy']);
    
});

Route::middleware(['cliente'])->group(function () {
    Route::match(['get', 'post'], '/endereco', [AddressController::class, 'endereco'])->name("endereco");
    Route::match(['get', 'post'], '/endereco/edit/{id}', [AddressController::class, 'edit'])->name("enderecoEdit");
    Route::put('/endereco/update/{id}', [AddressController::class, 'update']);
});





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        
        
        $users = User::all();
        return view('dashboard', ['users'=>$users]);
    })->name('dashboard');
});
