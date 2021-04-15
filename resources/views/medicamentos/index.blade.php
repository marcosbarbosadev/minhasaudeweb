@extends('template.app')
@section('page-title')
    <h1 class="titulo-pagina">Cadastro de Medicamento</h1>
@endsection
@section('content')
    @include('template/messages')

    <form method="post" action="{{ route('medicamento.index') }}">
        @csrf
        <input type="hidden" name="id" value="{{ $medicamento->id }}">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="nome">Nome medicamento</label>
                    <input required type="text" id="nome" name="nome" class="form-control" value="{{ $medicamento->nome  }}">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <select required class="form-control" id="tipo" name="tipo">
                        <option value="">Selecionar tipo</option>
                        <option value="gotas" {{ $medicamento->tipo == 'gotas' ? 'selected' : '' }}>Gotas</option>
                        <option value="comprimido" {{ $medicamento->tipo == 'comprimido' ? 'selected' : '' }}>Comprimido</option>
                    </select>
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <label for="nomeMedicamento">Laboratório</label>
                    <select required class="form-control" id="laboratorio_id" name="laboratorio_id">
                        <option value="">Selecionar labratório</option>
                        @foreach($laboratorios as $lab)
                            <option value="{{ $lab->id }}" {{ $lab->id == $medicamento->laboratorio_id ? 'selected' : '' }}>{{ $lab->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="mg">mg</label>
                    <input type="text" id="mg" name="mg" class="form-control">
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
            <th scope="col">Tipo</th>
            <th scope="col">Laboratório</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @if(!$medicamentos->isEmpty())
            @foreach($medicamentos as $med)
                <tr>
                    <th scope="row">{{ $med->id  }}</th>
                    <td>{{ $med->nome }}</td>
                    <td>{{ $med->tipo }}</td>
                    <td>{{ $med->laboratorio->nome}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('medicamento.edit', ['id' => $med->id]) }}">
                            <i class="bi-pencil"></i>
                        </a>
                        <a class="btn btn-danger" href="{{ route('medicamento.delete', ['id' => $med->id]) }}"
                           data-toggle="modal" data-target="#confirmaExclusao"
                           data-item-title="{{ $med->nome }}" data-item-id="{{ $med->id }}">
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

    <input id="baseUrlCurrentPage" type="hidden" value="{{ url('medicamentos') }}">

@endsection

@include('template/modal_confirmacao')
