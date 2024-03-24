<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class MangaController extends Controller
{
    public function home(Request $request){
        $qtd = $request['qtd'] ? : 4;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];

        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });

        if ($buscar) {
            $colecao_manga = \App\Models\Mangas\colecao_manga::with('mangas')->where('nome', 'LIKE', '%' . $buscar . '%')->paginate($qtd);
        } else {
            $colecao_manga = \App\Models\Mangas\colecao_manga::with('mangas')->paginate($qtd);
        }

        $colecao_manga = $colecao_manga->appends(Request::capture()->except('page'));

        return view('mangas.colecao.index', compact('colecao_manga'));
    }

    public function colecao_create(){

        return view('mangas.colecao.create');

    }

    public function colecao_store(Request $request){

        \App\Models\Mangas\colecao_manga::create($request->all());

        return redirect()->route('manga.colecao.create');
    }

    public function colecao_edit($id)
    {
        $colecao_manga = \App\Models\Mangas\colecao_manga::find($id);

        return view('mangas.colecao.edit', compact('colecao_manga'));
    }

    public function colecao_update(Request $request, $id)
    {
        $colecao_manga = \App\Models\Mangas\colecao_manga::find($id);
        $dados = $request->all();
        $colecao_manga->update($dados);

        return redirect()->route('manga.home');
    }

    public function colecao_destroy($id)
    {
        $colecao_manga = \App\Models\Mangas\colecao_manga::find($id);

        $colecao_manga->deletarMangas();

        $colecao_manga->delete();

        return redirect()->route('manga.home');
    }


    public function index(Request $request, $id)
    {
        $qtd = $request['qtd'] ? : 4;
        $page = $request['page'] ?: 1;
        $buscar = $request['buscar'];

        Paginator::currentPageResolver(function () use ($page){
            return $page;
        });

        $colecao_manga = \App\Models\Mangas\colecao_manga::find($id);
        $manga = $colecao_manga->mangas();

        if ($buscar) {
            $manga->where('nome', 'LIKE', '%' . $buscar . '%');
        }

        $manga->orderBy('numero_ordem', 'desc');

        $manga = $manga->paginate($qtd);

        $manga = $manga->appends(Request::capture()->except('page'));

        return view('mangas.manga.index_manga', compact('manga', 'colecao_manga'));
    }

    public function manga_create($id){

        $colecao_manga = \App\Models\Mangas\colecao_manga::find($id);

        return view('mangas.manga.create_manga', compact('colecao_manga'));

    }

    public function manga_store(Request $request, $id){

        $manga = new \App\Models\Mangas\manga;
        $manga->colecao_id = $id;
        $manga->nome = $request->input('nome');
        $manga->numero_ordem = $request->input('numero_ordem');
        $manga->data_inicio = $request->input('data_inicio');
        $manga->data_fim = $request->input('data_fim');

        $manga->save();

        return redirect()->route('manga.create', $id);
    }

    public function manga_edit($id)
    {
        $manga = \App\Models\Mangas\manga::find($id);

        return view('mangas.manga.edit_manga', compact('manga'));
    }

    public function manga_update(Request $request, $id)
    {
        $manga = \App\Models\Mangas\manga::find($id);
        $dados = $request->all();
        $manga->update($dados);

        return redirect()->route('manga.index', $manga->colecao_id);
    }

    public function manga_destroy($id)
    {
        $manga = \App\Models\Mangas\manga::find($id);
        $novo_id = $manga->colecao_id;
        $manga->delete();

        return redirect()->route('manga.index', $novo_id);
    }
}
