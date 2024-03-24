@extends('shared.base')

@section('content')
    <div class="panel panel-default">

        <div class="panel-heading"><h3>Cadastre o episodio do anime {{ $colecao_anime->nome}}</h3></div>
        <div class="panel-body">

    <form method="post" action="{{route ('anime.store', $colecao_anime->id)}}">
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
                    <input type="date" class="form-control" style="font-size: 1.7rem;" placeholder="Data Inicio" name="data_inicio" >
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
                    <label for="numero_ordem">Volume do anime</label>
                    <input type="number" class="form-control" style="font-size: 1.7rem;" placeholder="Número de Ordem" name="numero_ordem" required>
                </div>
            </div>
        </div>
        <a href="{{route('anime.index', $colecao_anime->id)}}" class="btn btn-secondary btn-lg">Voltar</a>
        <button type="submit" class="btn btn-primary btn-lg">Cadastrar</button>
    </form>
        </div>
    </div>

@endsection
