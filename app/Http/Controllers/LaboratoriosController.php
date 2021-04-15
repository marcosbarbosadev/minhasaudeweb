<?php

namespace App\Http\Controllers;

use App\Models\Laboratorio;
use App\Models\Uf;
use Illuminate\Http\Request;

class LaboratoriosController extends Controller
{
    public function index(Request $request, $id = null) {

        if($request->id != null) {
            $laboratorio = Laboratorio::find($request->id);
        } else {
            $laboratorio = new Laboratorio();
        }

        if($request->isMethod('post')) {
            $id = $request->id;
            $nome = $request->nome;
            $endereco = $request->endereco;
            $cidade = $request->cidade;
            $cep = $request->cep;
            $uf_id = $request->uf_id;

            $laboratorio->id = $id;
            $laboratorio->nome = $nome;
            $laboratorio->endereco = $endereco;
            $laboratorio->cidade = $cidade;
            $laboratorio->cep = $cep;
            $laboratorio->uf_id = $uf_id;
            $laboratorio->save();

            $acao = $request->id != null ? 'atualizado' : 'cadastrado';
            return redirect()->route('laboratorio.index', ['menu' => 'laboratorios'])
                ->with('success', 'Laboratório ' . $acao . ' com sucesso.');

        }

        $ufs = Uf::all();
        $laboratorios = Laboratorio::all();
        return view('laboratorios.index', [
            'ufs' => $ufs,
            'laboratorios' => $laboratorios,
            'laboratorio' => $laboratorio
        ]);
    }

    public function delete($id)
    {
        if($id != null) {
            Laboratorio::where('id', $id)->delete();
            return redirect()->route('laboratorio.index', ['menu' => 'laboratorios'])
                ->with('success', 'Laboratório removido com sucesso.');

        }
    }

}
