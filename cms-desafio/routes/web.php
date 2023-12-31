<?php

use Illuminate\Support\Facades\Route;
use App\Mail\MensagemTesteMail;
use App\Http\Controllers\TarefaController;

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

/*
Route::get('/', function () {
    return view('welcome');
});
*/



Auth::routes(['verify' => true]);


/*
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
*/
Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.principal');
Route::resource('/tarefa', 'App\Http\Controllers\TarefaController')->middleware('verified');

Route::controller(TarefaController::class)->group(function () {
    Route::get('pdf/download/{id}', 'downloadPDF')->middleware('verified');
    Route::get('img/download/{id}', 'downloadIMG')->middleware('verified');
});


Route::get('/mensagem-teste', function () {
    return new MensagemTesteMail();
});

Route::fallback(function () {
    echo 'A rota acessada não existe. <a href="' . route('site.principal') . '">Clique aqui</a>';
});

/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::get('/admin/link', [HomeController::class, 'adminHello'])->name('admin.hello');
});
