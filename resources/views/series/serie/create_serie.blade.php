@extends('shared.base')

@section('content')
    <div class="panel panel-default">

        <div class="panel-heading"><h3>Cadastre o episodio da serie {{ $colecao_serie->nome}}</h3></div>
        <div class="panel-body">

    <form method="post" action="{{route ('serie.store', $colecao_serie->id)}}">
        {{ csrf_field() }}
        <h4>Dados do episodio</h4>
        <hr>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" style="font-size: 1.7rem;" placeholder="nome" name="nome" required>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="data_inicio">Data Inicio</label>
                    <input type="date" class="form-control" style="font-size: 1.7rem;" placeholder="Data Inicio" name="data_inicio">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="data_fim">Data Fim</label>
                    <input type="date" class="form-control" style="font-size: 1.7rem;" placeholder="Data Fim" name="data_fim" >
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="numero_ordem">Número do episodio</label>
                    <input type="number" class="form-control" style="font-size: 1.7rem;" placeholder="Número de Ordem" name="numero_ordem" required>
                </div>
            </div>
        </div>
        <a href="{{route('serie.index', $colecao_serie->id)}}" class="btn btn-secondary btn-lg">Voltar</a>
        <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
    </form>
        </div>
    </div>

@endsection
