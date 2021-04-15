@extends('template.app')
@section('page-title')
    <h1 class="titulo-pagina">Cadastro de Laboratório</h1>
@endsection


@section('content')

    @include('template/messages')

    <form method="post" action="{{ route('laboratorio.index') }}">
        @csrf
        <input type="hidden" name="id" value="{{  $laboratorio->id }}">
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input required autocomplete="nope" type="text" id="nome" name="nome" class="form-control" value="{{ $laboratorio->nome }}">
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="form-group">
                    <label for="tipo">Endereço</label>
                    <input required autocomplete="nope" type="text" id="endereco" name="endereco" class="form-control" value="{{ $laboratorio->endereco }}">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label for="laboratorio_id">Cidade</label>
                    <input required autocomplete="nope" type="text" id="cidade" name="cidade" class="form-control" value="{{ $laboratorio->cidade }}">
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                    <label for="mg">CEP</label>
                    <input required autocomplete="nope" type="text" id="cep" name="cep" class="form-control" value="{{ $laboratorio->cep }}">
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="form-group">
                    <label for="mg">UF</label>
                    <select required class="form-control" id="uf_id" name="uf_id">
                        <option value="">Selecionar labratório</option>
                        @foreach($ufs as $uf)
                            <option value="{{ $uf->id }}" {{ $laboratorio->uf_id ==  $uf->id ? 'selected' : ''}}>{{ $uf->nome }}</option>
                        @endforeach
                    </select>
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
            <th scope="col">Laboratório</th>
            <th scope="col">Cidade</th>
            <th scope="col">UF</th>
            <th scope="col">Ações</th>
        </tr>
        </thead>
        <tbody>
        @if(!$laboratorios->isEmpty())
            @foreach($laboratorios as $lab)
                <tr>
                    <th scope="row">{{ $lab->id  }}</th>
                    <td>{{ $lab->nome }}</td>
                    <td>{{ $lab->cidade }}</td>
                    <td>{{ $lab->uf->sigla}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('laboratorio.edit', ['id' => $lab->id]) }}">
                            <i class="bi-pencil"></i>
                        </a>
                        <a class="btn btn-danger" href="{{ route('laboratorio.delete', ['id' => $lab->id]) }}"
                           data-toggle="modal" data-target="#confirmaExclusao"
                           data-item-title="{{ $lab->nome }}" data-item-id="{{ $lab->id }}">
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

    <input id="baseUrlCurrentPage" type="hidden" value="{{ url('laboratorios') }}">
@endsection

@include('template/modal_confirmacao')

