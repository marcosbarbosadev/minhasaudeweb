<?php

namespace App\Http\Controllers;

use App\Models\Laboratorio;
use App\Models\Medicamento;
use App\Models\Uf;
use Illuminate\Http\Request;

class MedicamentosController extends Controller
{
    public function index(Request $request, $id = null)
    {
        if($request->id != null) {
            $medicamento = Medicamento::find($request->id);
        } else {
            $medicamento = new Medicamento();
        }

        if($request->isMethod('post')) {
            $id = $request->id;
            $nome = $request->nome;
            $tipo = $request->tipo;
            $mg = $request->mg;
            $laboratorio_id = $request->laboratorio_id;

            $medicamento->id = $id;
            $medicamento->nome = $nome;
            $medicamento->tipo = $tipo;
            $medicamento->mg = $mg;
            $medicamento->laboratorio_id = $laboratorio_id;
            $medicamento->save();

            $acao = $request->id != null ? 'atualizado' : 'cadastrado';
            return redirect()->route('medicamento.index', ['menu' => 'medicamentos'])
                ->with('success', 'Medicamento ' . $acao . ' com sucesso.');

        }

        $laboratorios = Laboratorio::all();
        $medicamentos = Medicamento::all();
        return view('medicamentos.index', [
            'medicamentos' => $medicamentos,
            'medicamento' => $medicamento,
            'laboratorios' => $laboratorios
        ]);
    }

    public function delete($id)
    {
        if($id != null) {
            Medicamento::where('id', $id)->delete();
            return redirect()->route('medicamento.index', ['menu' => 'medicamentos'])
                ->with('success', 'Medicamento removido com sucesso.');

        }
    }

}
