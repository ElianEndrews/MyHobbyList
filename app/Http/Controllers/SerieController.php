<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class SerieController extends Controller
{
    public function home(Request $request){
        $qtd = $request['qtd'] ? : 4;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];

        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });

        if ($buscar) {
            $colecao_serie = \App\Models\Series\colecao_serie::with('series')->where('nome', 'LIKE', '%' . $buscar . '%')->paginate($qtd);
        } else {
            $colecao_serie = \App\Models\Series\colecao_serie::with('series')->paginate($qtd);
        }

        $colecao_serie = $colecao_serie->appends(Request::capture()->except('page'));

        return view('series.colecao.index', compact('colecao_serie'));
    }

    public function colecao_create(){

        return view('series.colecao.create');

    }

    public function colecao_store(Request $request){

        \App\Models\Series\colecao_serie::create($request->all());

        return redirect()->route('serie.colecao.create');
    }

    public function colecao_edit($id)
    {
        $colecao_serie = \App\Models\Series\colecao_serie::find($id);

        return view('series.colecao.edit', compact('colecao_serie'));
    }

    public function colecao_update(Request $request, $id)
    {
        $colecao_serie = \App\Models\Series\colecao_serie::find($id);
        $dados = $request->all();
        $colecao_serie->update($dados);

        return redirect()->route('serie.home');
    }

    public function colecao_destroy($id)
    {
        $colecao_serie = \App\Models\Series\colecao_serie::find($id);

        $colecao_serie->deletarSeries();

        $colecao_serie->delete();

        return redirect()->route('serie.home');
    }


    public function index(Request $request, $id)
    {
        $qtd = $request['qtd'] ? : 4;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];

        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });

        $colecao_serie = \App\Models\Series\colecao_serie::find($id);
        $serie = $colecao_serie->series();

        if ($buscar) {
            $serie->where('nome', 'LIKE', '%' . $buscar . '%');
        }

        $serie->orderBy('numero_ordem', 'desc');

        $serie = $serie->paginate($qtd);

        $serie = $serie->appends(Request::capture()->except('page'));

        return view('series.serie.index_serie', compact('serie', 'colecao_serie'));
    }

    public function serie_create($id){

        $colecao_serie = \App\Models\Series\colecao_serie::find($id);

        return view('series.serie.create_serie', compact('colecao_serie'));

    }

    public function serie_store(Request $request, $id){

        $serie = new \App\Models\Series\serie;
        $serie->colecao_id = $id;
        $serie->nome = $request->input('nome');
        $serie->numero_ordem = $request->input('numero_ordem');
        $serie->data_inicio = $request->input('data_inicio');
        $serie->data_fim = $request->input('data_fim');

        $serie->save();

        return redirect()->route('serie.create', $id);
    }

    public function serie_edit($id)
    {
        $serie = \App\Models\Series\serie::find($id);

        return view('series.serie.edit_serie', compact('serie'));
    }

    public function serie_update(Request $request, $id)
    {
        $serie = \App\Models\Series\serie::find($id);
        $dados = $request->all();
        $serie->update($dados);

        return redirect()->route('serie.index', $serie->colecao_id);
    }

    public function serie_destroy($id)
    {
        $serie = \App\Models\Series\serie::find($id);
        $novo_id = $serie->colecao_id;
        $serie->delete();

        return redirect()->route('serie.index', $novo_id);
    }
}

