@extends('shared.base')

@section('content')
    <div class="panel panel-default">

        <div class="panel-heading"><h3>Editar a series</h3></div>
        <div class="panel-body">

    <form method="post" action="{{route ('serie.colecao.update', $colecao_serie->id)}}">
        {{ csrf_field() }}
        <h4>Dados da coleção {{$colecao_serie->nome}}</h4>
        <hr>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" style="font-size: 1.7rem;" placeholder="nome" name="nome" required value="{{$colecao_serie->nome}}">
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="data_inicio">Data Inicio</label>
                    <input type="date" class="form-control" style="font-size: 1.7rem;" placeholder="Data Inicio" name="data_inicio" value="{{$colecao_serie->data_inicio}}">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="data_fim">Data Fim</label>
                    <input type="date" class="form-control" style="font-size: 1.7rem;" placeholder="Data Fim" name="data_fim" value="{{$colecao_serie->data_fim}}">
                </div>
            </div>
        </div>
        <a href="{{route('serie.home')}}" class="btn btn-secondary btn-lg">Voltar</a>
        <button type="submit" class="btn btn-primary btn-lg">Editar</button>
    </form>
        </div>
    </div>

@endsection
