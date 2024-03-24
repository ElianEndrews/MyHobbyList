@extends('shared.base')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Lista de series</div>
        <form method="GET" action="{{route('serie.home', 'buscar' )}}">
            <div class="row m-3">
                <div class="col-md-5">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Digite o nome da coleção" name="buscar" style="font-size: 1.7rem;">
                        <span>
                            <button class="btn btn-info btn-lg" style="margin: 2px 0px 0px 10px" type="submit">Pesquisar</button>
                        </span>
                    </div>
                </div>
            </div>
            </form>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Coleção</th>
                            <th>Quantidade de episodios</th>
                            <th>Data Inicio</th>
                            <th>Data fim</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($colecao_serie->items() as $colecao_series)
                            <tr>
                                <td>{{$colecao_series->nome}}</td>
                                <td class="text-center">{{ $colecao_series->series->count() }}</td>
                                <td>@if ($colecao_series->data_inicio) {{ \Carbon\Carbon::parse($colecao_series->data_inicio)->format('d/m/Y') }} @endif</td>
                                <td>@if ($colecao_series->data_fim) {{ \Carbon\Carbon::parse($colecao_series->data_fim)->format('d/m/Y') }} @endif</td>
                                <td class="d-flex justify-content-around">
                                    <a href="{{route('serie.index', $colecao_series->id)}}" class="btn btn-primary btn-lg">Detalhes</a>
                                    <a href="{{route('serie.colecao.edit', $colecao_series->id)}}" class="btn btn-secondary btn-lg">Editar</a>
                                    <a href="javascript:void(0);" onclick="if (confirm('Deletar essa coleção?')) { window.location.href = '{{route('serie.colecao.destroy', $colecao_series->id)}}'; }" class="btn btn-danger btn-lg">Deletar</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div align="center" class="row">
                {{ $colecao_serie->links("pagination::bootstrap-4") }}
            </div>
        </div>

    </div>
    <a href="{{route('home')}}" class="btn btn-secondary btn-lg">Voltar</a>
    <a href="{{route('serie.colecao.create')}}"><button class="btn btn-primary btn-lg">Adicionar</button></a>
@endsection
