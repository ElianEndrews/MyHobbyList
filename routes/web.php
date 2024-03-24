<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\AnimeController;
use App\Http\Controllers\FilmeController;
use App\Http\Controllers\MangaController;
use App\Http\Controllers\SerieController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

// rotas de filmes

Route::get('/filme', [FilmeController::class, 'home'])->name('filme.home');
Route::get('/filme/colecao/create', [FilmeController::class, 'colecao_create'])->name('filme.colecao.create');
Route::post('/filme/colecao/adicionar', [FilmeController::class, 'colecao_store'])->name('filme.colecao.store');
Route::get('/filme/colecao/editar/{id}', [FilmeController::class, 'colecao_edit'])->name('filme.colecao.edit');
Route::post('/filme/colecao/update/{id}', [FilmeController::class, 'colecao_update'])->name('filme.colecao.update');
Route::get('/filme/colecao/deletar/{id}', [FilmeController::class, 'colecao_destroy'])->name('filme.colecao.destroy');

Route::get('/filme/view/{id}', [FilmeController::class, 'index'])->name('filme.index');
Route::get('/filme/create/{id}', [FilmeController::class, 'filme_create'])->name('filme.create');
Route::post('/filme/adicionar/{id}', [FilmeController::class, 'filme_store'])->name('filme.store');
Route::get('/filme/editar/{id}', [FilmeController::class, 'filme_edit'])->name('filme.edit');
Route::post('/filme/update/{id}', [FilmeController::class, 'filme_update'])->name('filme.update');
Route::get('/filme/deletar/{id}', [FilmeController::class, 'filme_destroy'])->name('filme.destroy');


// rotas de series

Route::get('/serie', [SerieController::class, 'home'])->name('serie.home');
Route::get('/serie/colecao/create', [SerieController::class, 'colecao_create'])->name('serie.colecao.create');
Route::post('/serie/colecao/adicionar', [SerieController::class, 'colecao_store'])->name('serie.colecao.store');
Route::get('/serie/colecao/editar/{id}', [SerieController::class, 'colecao_edit'])->name('serie.colecao.edit');
Route::post('/serie/colecao/update/{id}', [SerieController::class, 'colecao_update'])->name('serie.colecao.update');
Route::get('/serie/colecao/deletar/{id}', [SerieController::class, 'colecao_destroy'])->name('serie.colecao.destroy');

Route::get('/serie/view/{id}', [SerieController::class, 'index'])->name('serie.index');
Route::get('/serie/create/{id}', [SerieController::class, 'serie_create'])->name('serie.create');
Route::post('/serie/adicionar/{id}', [SerieController::class, 'serie_store'])->name('serie.store');
Route::get('/serie/editar/{id}', [SerieController::class, 'serie_edit'])->name('serie.edit');
Route::post('/serie/update/{id}', [SerieController::class, 'serie_update'])->name('serie.update');
Route::get('/serie/deletar/{id}', [SerieController::class, 'serie_destroy'])->name('serie.destroy');

// rotas de livros

Route::get('/livro', [LivroController::class, 'home'])->name('livro.home');
Route::get('/livro/colecao/create', [LivroController::class, 'colecao_create'])->name('livro.colecao.create');
Route::post('/livro/colecao/adicionar', [LivroController::class, 'colecao_store'])->name('livro.colecao.store');
Route::get('/livro/colecao/editar/{id}', [LivroController::class, 'colecao_edit'])->name('livro.colecao.edit');
Route::post('/livro/colecao/update/{id}', [LivroController::class, 'colecao_update'])->name('livro.colecao.update');
Route::get('/livro/colecao/deletar/{id}', [LivroController::class, 'colecao_destroy'])->name('livro.colecao.destroy');

Route::get('/livro/view/{id}', [LivroController::class, 'index'])->name('livro.index');
Route::get('/livro/create/{id}', [LivroController::class, 'livro_create'])->name('livro.create');
Route::post('/livro/adicionar/{id}', [LivroController::class, 'livro_store'])->name('livro.store');
Route::get('/livro/editar/{id}', [LivroController::class, 'livro_edit'])->name('livro.edit');
Route::post('/livro/update/{id}', [LivroController::class, 'livro_update'])->name('livro.update');
Route::get('/livro/deletar/{id}', [LivroController::class, 'livro_destroy'])->name('livro.destroy');


// rotas de animes

Route::get('/anime', [AnimeController::class, 'home'])->name('anime.home');
Route::get('/anime/colecao/create', [AnimeController::class, 'colecao_create'])->name('anime.colecao.create');
Route::post('/anime/colecao/adicionar', [AnimeController::class, 'colecao_store'])->name('anime.colecao.store');
Route::get('/anime/colecao/editar/{id}', [AnimeController::class, 'colecao_edit'])->name('anime.colecao.edit');
Route::post('/anime/colecao/update/{id}', [AnimeController::class, 'colecao_update'])->name('anime.colecao.update');
Route::get('/anime/colecao/deletar/{id}', [AnimeController::class, 'colecao_destroy'])->name('anime.colecao.destroy');

Route::get('/anime/view/{id}', [animeController::class, 'index'])->name('anime.index');
Route::get('/anime/create/{id}', [animeController::class, 'anime_create'])->name('anime.create');
Route::post('/anime/adicionar/{id}', [animeController::class, 'anime_store'])->name('anime.store');
Route::get('/anime/editar/{id}', [animeController::class, 'anime_edit'])->name('anime.edit');
Route::post('/anime/update/{id}', [animeController::class, 'anime_update'])->name('anime.update');
Route::get('/anime/deletar/{id}', [animeController::class, 'anime_destroy'])->name('anime.destroy');
// rotas de mangas

Route::get('/manga', [MangaController::class, 'home'])->name('manga.home');
Route::get('/manga/colecao/create', [MangaController::class, 'colecao_create'])->name('manga.colecao.create');
Route::post('/manga/colecao/adicionar', [MangaController::class, 'colecao_store'])->name('manga.colecao.store');
Route::get('/manga/colecao/editar/{id}', [MangaController::class, 'colecao_edit'])->name('manga.colecao.edit');
Route::post('/manga/colecao/update/{id}', [MangaController::class, 'colecao_update'])->name('manga.colecao.update');
Route::get('/manga/colecao/deletar/{id}', [MangaController::class, 'colecao_destroy'])->name('manga.colecao.destroy');

Route::get('/manga/view/{id}', [MangaController::class, 'index'])->name('manga.index');
Route::get('/manga/create/{id}', [MangaController::class, 'manga_create'])->name('manga.create');
Route::post('/manga/adicionar/{id}', [MangaController::class, 'manga_store'])->name('manga.store');
Route::get('/manga/editar/{id}', [MangaController::class, 'manga_edit'])->name('manga.edit');
Route::post('/manga/update/{id}', [MangaController::class, 'manga_update'])->name('manga.update');
Route::get('/manga/deletar/{id}', [MangaController::class, 'manga_destroy'])->name('manga.destroy');

