@extends('shared.base')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading">Lista de livros da coleção {{$colecao_livro->nome}}</div>
        <div class="d-flex justify-content-between align-items-center mb-4 mt-2">
            <form method="GET" action="{{ route('livro.index', ['buscar' => 'search', 'id' => $colecao_livro->id]) }}" class="col-md-5">
                <div>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Digite o nome do livro" name="buscar" style="font-size: 1.7rem;">
                        <span>
                            <button class="btn btn-info btn-lg" style="margin: 2px 0px 0px 10px" type="submit">Pesquisar</button>
                        </span>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Livro</th>
                            <th>Data Inicio</th>
                            <th>Data fim</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($livro as $livros)
                            <tr>
                                <td>{{$livros->nome}}</td>
                                <td>@if ($livros->data_inicio){{ \Carbon\Carbon::parse($livros->data_inicio)->format('d/m/Y') }} @endif</td>
                                <td>@if ($livros->data_fim){{ \Carbon\Carbon::parse($livros->data_fim)->format('d/m/Y') }} @endif</td>
                                <td class="d-flex justify-content-around">
                                    <a href="{{route('livro.edit', $livros->id)}}" class="btn btn-secondary btn-lg">Editar</a>
                                    <a href="javascript:void(0);" onclick="if (confirm('Deletar esse livro?')) { window.location.href = '{{route('livro.destroy', $livros->id)}}'; }" class="btn btn-danger btn-lg">Deletar</a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <div align="center" class="row">
                {{ $livro->links("pagination::bootstrap-4") }}
            </div>
        </div>

    </div>
    <a href="{{route('livro.home')}}" class="btn btn-secondary btn-lg">Voltar</a>
    <a href="{{route('livro.create', $colecao_livro->id)}}"><button class="btn btn-primary btn-lg">Adicionar</button></a>

@endsection
