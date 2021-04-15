<?php

use App\Http\Controllers\LaboratoriosController;
use App\Http\Controllers\LiberacaoMedicamentoController;
use App\Http\Controllers\MedicamentosController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LiberacaoMedicamentoController::class, 'index']);

Route::match(['get', 'post'], 'medicamentos', [
    MedicamentosController::class, 'index'
])->name('medicamento.index');

Route::get('medicamentos/{id}', [
    MedicamentosController::class, 'index'
])->name('medicamento.edit');

Route::get('medicamentos/{id}/delete', [
    MedicamentosController::class, 'delete'
])->name('medicamento.delete');

Route::match(['get', 'post'], 'laboratorios', [
    LaboratoriosController::class, 'index'
])->name('laboratorio.index');

Route::get('laboratorios/{id}', [
    LaboratoriosController::class, 'index'
])->name('laboratorio.edit');

Route::get('laboratorios/{id}/delete', [
    LaboratoriosController::class, 'delete'
])->name('laboratorio.delete');

Route::match(['get', 'post'], 'liberar-medicamento', [
    LiberacaoMedicamentoController::class, 'index'
])->name('liberar-medicamento.index');
Route::get('liberar-medicamento/{id}/delete', [
    LiberacaoMedicamentoController::class, 'delete'
])->name('liberar-medicamento.delete');
