<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class AnimeController extends Controller
{
    public function home(Request $request){
        $qtd = $request['qtd'] ? : 4;
        $page = $request['page'] ? : 1;
        $buscar = $request['buscar'];

        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });

        if($buscar){
            $colecao_anime = \App\Models\Animes\colecao_anime::with('animes')->where('nome', 'LIKE', '%' . $buscar . '%')->paginate($qtd);
        }else {
            $colecao_anime = \App\Models\Animes\colecao_anime::with('animes')->paginate($qtd);
        }

        $colecao_anime = $colecao_anime->appends(Request::capture()->except('page'));

        return view('animes.colecao.index', compact('colecao_anime'));
    }

    public function colecao_create(){

        return view('animes.colecao.create');

    }

    public function colecao_store(Request $request){
        \App\Models\Animes\colecao_anime::create($request->all());

        return redirect()->route('anime.colecao.create');
    }

    public function colecao_edit($id)
    {
        $colecao_anime = \App\Models\Animes\colecao_anime::find($id);

        return view('animes.colecao.edit', compact('colecao_anime'));
    }

    public function colecao_update(Request $request, $id)
    {
        $colecao_anime = \App\Models\Animes\colecao_anime::find($id);
        $dados = $request->all();
        $colecao_anime->update($dados);

        return redirect()->route('anime.home');
    }

    public function colecao_destroy($id)
    {
        $colecao_anime = \App\Models\Animes\colecao_anime::find($id);
        $colecao_anime->deletarAnimes();
        $colecao_anime->delete();

        return redirect()->route('anime.home');
    }

    public function index(Request $request, $id)
    {
        $qtd = $request['qtd'] ? : 4;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];

        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });

        $colecao_anime = \App\Models\Animes\colecao_anime::find($id);
        $anime = $colecao_anime->animes();

        if ($buscar) {
            $anime->where('nome', 'LIKE', '%' . $buscar . '%');
        }

        $anime->orderBy('numero_ordem', 'desc');

        $anime = $anime->paginate($qtd);

        $anime = $anime->appends(Request::capture()->except('page'));

        return view('animes.anime.index_anime', compact('anime', 'colecao_anime'));
    }

    public function anime_create($id){

        $colecao_anime = \App\Models\Animes\colecao_anime::find($id);

        return view('animes.anime.create_anime', compact('colecao_anime'));

    }

    public function anime_store(Request $request, $id){

        $anime = new \App\Models\Animes\anime;
        $anime->colecao_id = $id;
        $anime->nome = $request->input('nome');
        $anime->numero_ordem = $request->input('numero_ordem');
        $anime->data_inicio = $request->input('data_inicio');
        $anime->data_fim = $request->input('data_fim');

        $anime->save();

        return redirect()->route('anime.create', $id);
    }

    public function anime_edit($id)
    {
        $anime = \App\Models\Animes\anime::find($id);

        return view('animes.anime.edit_anime', compact('anime'));
    }

    public function anime_update(Request $request, $id)
    {
        $anime = \App\Models\Animes\anime::find($id);
        $dados = $request->all();
        $anime->update($dados);

        return redirect()->route('anime.index', $anime->colecao_id);
    }

    public function anime_destroy($id)
    {
        $anime = \App\Models\Animes\anime::find($id);
        $novo_id = $anime->colecao_id;
        $anime->delete();

        return redirect()->route('anime.index', $novo_id);
    }
}
