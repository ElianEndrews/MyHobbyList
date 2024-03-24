@extends('shared.base')

@section('content')
    <div class="panel panel-default">

        <div class="panel-heading"><h3>Editar o capitulo</h3></div>
        <div class="panel-body">

    <form method="post" action="{{route ('manga.update', $manga->id)}}">
        {{ csrf_field() }}
        <h4>Dados do capitulo {{$manga->nome}}</h4>
        <hr>
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" class="form-control" style="font-size: 1.7rem;" placeholder="nome" name="nome" required value="{{$manga->nome}}">
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    <label for="data_inicio">Data Inicio</label>
                    <input type="date" class="form-control" style="font-size: 1.7rem;" placeholder="Data Inicio" name="data_inicio" value="{{$manga->data_inicio}}">
                </div>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <label for="data_fim">Data Fim</label>
                    <input type="date" class="form-control" style="font-size: 1.7rem;" placeholder="Data Fim" name="data_fim" value="{{$manga->data_fim}}">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="numero_ordem">Número do capitulo</label>
                    <input type="number" class="form-control" style="font-size: 1.7rem;" placeholder="Número de Ordem" name="numero_ordem" required value="{{$manga->numero_ordem}}">
                </div>
            </div>
        </div>
        <a href="{{route('manga.index', $manga->colecao_id)}}" class="btn btn-secondary btn-lg">Voltar</a>
        <button type="submit" class="btn btn-primary btn-lg">Editar</button>
    </form>
        </div>
    </div>

@endsection
