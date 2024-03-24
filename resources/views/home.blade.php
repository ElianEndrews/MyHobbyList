@extends('shared.base')
@section('content')

<div class="container text-center mt-4" style="height: 70vh; display: flex; flex-direction: column; justify-content: center;">
    <div class="row justify-content-between mb-5">
        <div class="col-12 col-md-2">
            <a href="{{route('filme.home')}}" class="d-flex flex-column align-items-center">
                <i class="fas fa-film fa-5x mb-2"></i>
                <span>Filmes</span>
            </a>
        </div>
        <div class="col-12 col-md-2">
            <a href="{{route('serie.home')}}" class="d-flex flex-column align-items-center">
                <i class="fas fa-tv fa-5x mb-2"></i>
                <span>Séries</span>
            </a>
        </div>
        <div class="col-12 col-md-2">
            <a href="{{route('livro.home')}}" class="d-flex flex-column align-items-center">
                <i class="fas fa-book fa-5x mb-2"></i>
                <span>Livros</span>
            </a>
        </div>
    </div>
    <div class="row justify-content-between mt-5">
        <div class="col-12 col-md-2">
            <a href="{{route('anime.home')}}" class="d-flex flex-column align-items-center">
                <i class="fas fa-torii-gate fa-5x mb-2"></i>
                <span>Animes</span>
            </a>
        </div>
        <div class="col-12 col-md-2">
            <a href="{{route('manga.home')}}" class="d-flex flex-column align-items-center">
                <i class="fas fa-book-open fa-5x mb-2"></i>
                <span>Mangás</span>
            </a>
        </div>
    </div>
</div>




@endsection
