<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class LivroController extends Controller
{
    public function home(Request $request){
        $qtd = $request['qtd'] ? : 4;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];

        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });

        if ($buscar) {
            $colecao_livro = \App\Models\Livros\colecao_livro::with('livros')->where('nome', 'LIKE', '%' . $buscar . '%')->paginate($qtd);
        } else {
            $colecao_livro = \App\Models\Livros\colecao_livro::with('livros')->paginate($qtd);
        }

        $colecao_livro = $colecao_livro->appends(Request::capture()->except('page'));

        return view('livros.colecao.index', compact('colecao_livro'));
    }

    public function colecao_create(){

        return view('livros.colecao.create');

    }

    public function colecao_store(Request $request){

        \App\Models\Livros\colecao_livro::create($request->all());

        return redirect()->route('livro.colecao.create');
    }

    public function colecao_edit($id)
    {
        $colecao_livro = \App\Models\Livros\colecao_livro::find($id);

        return view('livros.colecao.edit', compact('colecao_livro'));
    }

    public function colecao_update(Request $request, $id)
    {
        $colecao_livro = \App\Models\Livros\colecao_livro::find($id);
        $dados = $request->all();
        $colecao_livro->update($dados);

        return redirect()->route('livro.home');
    }

    public function colecao_destroy($id)
    {
        $colecao_livro = \App\Models\Livros\colecao_livro::find($id);

        $colecao_livro->deletarLivros();

        $colecao_livro->delete();

        return redirect()->route('livro.home');
    }


    public function index(Request $request, $id)
    {
        $qtd = $request['qtd'] ? : 4;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];

        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });

        $colecao_livro = \App\Models\Livros\colecao_livro::find($id);
        $livro = $colecao_livro->livros();

        if ($buscar) {
            $livro->where('nome', 'LIKE', '%' . $buscar . '%');
        }

        $livro->orderBy('numero_ordem', 'asc');

        $livro = $livro->paginate($qtd);

        $livro = $livro->appends(Request::capture()->except('page'));

        return view('livros.livro.index_livro', compact('livro', 'colecao_livro'));
    }

    public function livro_create($id){

        $colecao_livro = \App\Models\Livros\colecao_livro::find($id);

        return view('livros.livro.create_livro', compact('colecao_livro'));

    }

    public function livro_store(Request $request, $id){

        $livro = new \App\Models\Livros\livro;
        $livro->colecao_id = $id;
        $livro->nome = $request->input('nome');
        $livro->numero_ordem = $request->input('numero_ordem');
        $livro->data_inicio = $request->input('data_inicio');
        $livro->data_fim = $request->input('data_fim');

        $livro->save();

        return redirect()->route('livro.create', $id);
    }

    public function livro_edit($id)
    {
        $livro = \App\Models\Livros\livro::find($id);

        return view('livros.livro.edit_livro', compact('livro'));
    }

    public function livro_update(Request $request, $id)
    {
        $livro = \App\Models\Livros\livro::find($id);
        $dados = $request->all();
        $livro->update($dados);

        return redirect()->route('livro.index', $livro->colecao_id);
    }

    public function livro_destroy($id)
    {
        $livro = \App\Models\Livros\livro::find($id);
        $novo_id = $livro->colecao_id;
        $livro->delete();

        return redirect()->route('livro.index', $novo_id);
    }
}
