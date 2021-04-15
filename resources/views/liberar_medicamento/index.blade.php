@extends('template.app')
@section('page-title')
    <h1 class="titulo-pagina">Liberar Medicamento</h1>
@endsection
@section('content')

    @include('template/messages')

    <form method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="medicamento_id">Medicamento</label>
                    <select required class="form-control" id="medicamento_id" name="medicamento_id">
                        <option value="">Selecionar laboratório</option>
                        @foreach($medicamentos as $med)
                            <option value="{{ $med->id }}">{{ $med->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="paciente_id">Paciente</label>
                    <select required class="form-control" id="paciente_id" name="paciente_id">
                        <option value="">Selecionar paciente</option>
                        @foreach($pacientes as $p)
                            <option value="{{ $p->id }}">{{ $p->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="data">Data</label>
                    <input required type="date" id="data" name="data" class="form-control">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="data">Quantidade</label>
                    <input required type="text" id="quantidade" name="quantidade" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </form>

    <table class="table margin-top-50">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Medicamento</th>
            <th scope="col">Paciente</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @if(!$liberacoes->isEmpty())
            @foreach($liberacoes as $l)
                <tr>
                    <th scope="row">{{ $l->id  }}</th>
                    <td>{{ $l->medicamento->nome }}</td>
                    <td>{{ $l->paciente->nome }}</td>
                    <td>{{ $l->quantidade}}</td>
                    <td>
                        <a class="btn btn-danger" href="{{ route('liberar-medicamento.delete', ['id' => $l->id]) }}"
                           data-toggle="modal" data-target="#confirmaExclusao"
                           data-item-title="{{ $l->medicamento_id }}" data-item-id="{{ $l->id }}">
                            <i class="bi-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        @else
            <tr class="border-row-no-results">
                <td colspan="5">Nenhum intem cadastrado</td>
            </tr>
        @endif
        </tbody>
    </table>
    <input id="baseUrlCurrentPage" type="hidden" value="{{ url('liberar-medicamento') }}">
@endsection

@include('template/modal_confirmacao')
