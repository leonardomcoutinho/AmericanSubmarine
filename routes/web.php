<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FpagamentoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebhooksController;
use App\Models\User;
use Illuminate\Support\Facades\Route;




Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware(['admin'])->group(function () {
    Route::match(['get', 'post'], '/usuarios', [UserController::class, 'usuarios'])->name("usuario");

    Route::match(['get', 'post'], '/produtos', [ProductController::class, 'produto'])->name("produto");
    Route::match(['get', 'post'], '/criar_produto', [ProductController::class, 'createProduct'])->name("criar_produto");
    Route::match(['get', 'post'], '/criar', [ProductController::class, 'store'])->name("store_product");
    Route::get('/editar/produto/{id}',[ProductController::class, 'editar'])->name("edit_prod");
    Route::put('/editar/produto/{id}', [ProductController::class, 'update'])->name("upload_prod");
    Route::delete('/deletar/produto/{id}', [ProductController::class, 'destroy'])->name(("destroy_prod"));

    Route::match(['get', 'post'], '/forma-pagamento', [FpagamentoController::class, 'fpagamento'])->name("fpagamento");
    Route::match(['get', 'post'], '/forma-pagamento/store', [FpagamentoController::class, 'store'])->name("store_fp");
    Route::match(['get', 'post'], '/forma-pagamento/editar/{id}', [FpagamentoController::class, 'edit'])->name("edit_fp");
    Route::put('/forma-pagamento/update/{id}', [FpagamentoController::class, 'update'])->name("update_fp");


    Route::match(['get', 'post'], '/categorias', [CategoryController::class, 'categoria'])->name("categoria");    
    Route::match(['get', 'post'], '/store_cat', [CategoryController::class, 'store'])->name("store_cat");
    Route::match(['get', 'post'], '/editar/categoria/{id}', [CategoryController::class, 'edit'])->name("edit_categoria");
    Route::put('/editar/categoria/{id}', [CategoryController::class, 'update'])->name("update_cat");
    Route::delete('/deletar/categoria/{id}', [CategoryController::class, 'destroy']);

    Route::get('/pedidos',[PedidoController::class, 'pedidos'])->name('pedidos');
    Route::get('/pedidos/{id}',[PedidoController::class, 'verPedido'])->name('ver_pedido');
});

Route::middleware(['cliente'])->group(function () {
    Route::match(['get', 'post'], '/endereco', [AddressController::class, 'endereco'])->name("endereco");
    Route::match(['get', 'post'], '/endereco/edit/{id}', [AddressController::class, 'edit'])->name("enderecoEdit");
    Route::put('/endereco/update/{id}', [AddressController::class, 'update']);


    Route::match(['get', 'post'], '/addCart/{id}', [ProductController::class, 'addCart'])->name("addcart");
    Route::match(['get', 'post'], '/carrinho', [ProductController::class, 'cart'])->name("carrinho");
    Route::match(['get', 'post'], '/carrinho/delete/{indece}', [ProductController::class, 'cartDelete'])->name("cart_delete");

    Route::match(['get', 'post'], '/pedido/pagar', [PedidoController::class, 'pagar'])->name("pagar");    
    Route::match(['get', 'post'], '/pedido/pag-dinheiro/{id}', [PedidoController::class, 'pagDinheiro'])->name("pagdinheiro");    
    Route::match(['get', 'post'], '/pedido/finalizado/{id}', [PedidoController::class, 'show'])->name("show");
    Route::put('/pedido/pagar/{id}', [PedidoController::class, 'attPag'])->name("attpag");
    Route::match(['get', 'post'], '/compra/{id}/pagamento', [PedidoController::class, 'pagamento'])->name("pagamento");
    Route::match(['get', 'post'], '/pedido/{id}', [PedidoController::class, 'meuPedido'])->name("meu_pedido");

    Route::post('/webhooks', WebhooksController::class);
    
});





Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $users = User::all();
        return view('dashboard', ['users' => $users]);
    })->name('dashboard');
});
