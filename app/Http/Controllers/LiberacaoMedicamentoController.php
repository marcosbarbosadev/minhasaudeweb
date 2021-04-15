<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use App\Models\Laboratorio;
use App\Models\LiberacaoMedicamento;
use App\Models\Medicamento;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiberacaoMedicamentoController extends Controller
{
    public function index(Request $request)
    {
        if($request->isMethod('post')) {
            $id = $request->id;
            $medicamento_id = $request->medicamento_id;
            $paciente_id = $request->paciente_id;
            $quantidade = $request->quantidade;

            try {
                DB::beginTransaction();

                $liberacao = new LiberacaoMedicamento();
                $liberacao->id = $id;
                $liberacao->medicamento_id = $medicamento_id;
                $liberacao->paciente_id = $paciente_id;
                $liberacao->quantidade = $quantidade;
                $liberacao->save();

                $medicamentoEstoque = Estoque::where('medicamento_id', $medicamento_id)->first();
                $medicamentoEstoque->quantidade -= $quantidade;
                $medicamentoEstoque->save();

                DB::commit();

                return redirect()->route('liberar-medicamento.index', ['menu' => 'liberar-medicamentos'])
                    ->with('success', 'Liberação de medicamento realizada com sucesso.');
            } catch (Exeption $ex) {
                DB::rollBack();
                return redirect()->route('liberar-medicamento.index', ['menu' => 'liberar-medicamentos'])
                    ->with('error', 'Falha ao realizar liberação de medicmento');
            }

        }

        $pacientes = Paciente::all();
        $medicamentos = Medicamento::all();
        $liberacoes = LiberacaoMedicamento::all();
        return view('liberar_medicamento/index', [
            'pacientes' => $pacientes,
            'medicamentos' => $medicamentos,
            'liberacoes' => $liberacoes
        ]);
    }

    public function delete($id)
    {
        if($id != null) {

            try {

                DB::beginTransaction();

                $liberacao = LiberacaoMedicamento::find($id);
                $quantidade = $liberacao->quantidade;
                $medicamento_id = $liberacao->medicamento_id;

                LiberacaoMedicamento::where('id', $id)->delete();

                $medicamentoEstoque = Estoque::where('medicamento_id', $medicamento_id)->first();
                $medicamentoEstoque->quantidade += $quantidade;
                $medicamentoEstoque->save();

                DB::commit();

                return redirect()->route('liberar-medicamento.index', ['menu' => 'liberar-medicamentos'])
                    ->with('success', 'Liberação de medicamento removida com sucesso.');

            } catch(Exception $ex) {
                DB::rollBack();
                return redirect()->route('liberar-medicamento.index', ['menu' => 'liberar-medicamentos'])
                    ->with('success', 'Falha ao remover liberação de medicamento.');
            }

        }
    }

}
