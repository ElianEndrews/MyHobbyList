<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class FilmeController extends Controller
{
    public function home(Request $request){
        $qtd = $request['qtd'] ? : 4;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];

        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });

        if ($buscar) {
            $colecao_filme = \App\Models\Filmes\colecao_filme::with('filmes')->where('nome', 'LIKE', '%' . $buscar . '%')->paginate($qtd);
        } else {
            $colecao_filme = \App\Models\Filmes\colecao_filme::with('filmes')->paginate($qtd);
        }

        $colecao_filme = $colecao_filme->appends(Request::capture()->except('page'));

        return view('filmes.colecao.index', compact('colecao_filme'));
    }

    public function colecao_create(){

        return view('filmes.colecao.create');

    }

    public function colecao_store(Request $request){

        \App\Models\Filmes\colecao_filme::create($request->all());

        return redirect()->route('filme.colecao.create');
    }

    public function colecao_edit($id)
    {
        $colecao_filme = \App\Models\Filmes\colecao_filme::find($id);

        return view('filmes.colecao.edit', compact('colecao_filme'));
    }

    public function colecao_update(Request $request, $id)
    {
        $colecao_filme = \App\Models\Filmes\colecao_filme::find($id);
        $dados = $request->all();
        $colecao_filme->update($dados);

        return redirect()->route('filme.home');
    }

    public function colecao_destroy($id)
    {
        $colecao_filme = \App\Models\Filmes\colecao_filme::find($id);

        $colecao_filme->deletarFilmes();

        $colecao_filme->delete();

        return redirect()->route('filme.home');
    }


    public function index(Request $request, $id)
    {
        $qtd = $request['qtd'] ? : 4;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];

        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });

        $colecao_filme = \App\Models\Filmes\colecao_filme::find($id);
        $filme = $colecao_filme->filmes();

        if ($buscar) {
            $filme->where('nome', 'LIKE', '%' . $buscar . '%');
        }

        $filme->orderBy('numero_ordem', 'asc');

        $filme = $filme->paginate($qtd);

        $filme = $filme->appends(Request::capture()->except('page'));

        return view('filmes.filme.index_filme', compact('filme', 'colecao_filme'));
    }

    public function filme_create($id){

        $colecao_filme = \App\Models\Filmes\colecao_filme::find($id);

        return view('filmes.filme.create_filme', compact('colecao_filme'));

    }

    public function filme_store(Request $request, $id){

        $filme = new \App\Models\Filmes\filme;
        $filme->colecao_id = $id;
        $filme->nome = $request->input('nome');
        $filme->numero_ordem = $request->input('numero_ordem');
        $filme->data_inicio = $request->input('data_inicio');
        $filme->data_fim = $request->input('data_fim');

        $filme->save();

        return redirect()->route('filme.create', $id);
    }

    public function filme_edit($id)
    {
        $filme = \App\Models\Filmes\filme::find($id);

        return view('filmes.filme.edit_filme', compact('filme'));
    }

    public function filme_update(Request $request, $id)
    {
        $filme = \App\Models\Filmes\filme::find($id);
        $dados = $request->all();
        $filme->update($dados);

        return redirect()->route('filme.index', $filme->colecao_id);
    }

    public function filme_destroy($id)
    {
        $filme = \App\Models\Filmes\filme::find($id);
        $novo_id = $filme->colecao_id;
        $filme->delete();

        return redirect()->route('filme.index', $novo_id);
    }
}
