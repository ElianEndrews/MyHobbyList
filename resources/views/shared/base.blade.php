<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MyHobbyLog</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <style>
            body {
                    font-size: 16px!important;
                }
        </style>
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="btn" style="font-size:16px" href="{{route('home')}}">Início</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active pe-2"><a class="nav-link" href="{{route('filme.home')}}">Filmes</a></li>
                        <li class="nav-item pe-2"><a class="nav-link" href="{{route('serie.home')}}">Series</a></li>
                        <li class="nav-item pe-2"><a class="nav-link" href="{{route('livro.home')}}">Livros</a></li>
                        <li class="nav-item pe-2"><a class="nav-link" href="{{route('anime.home')}}">Animes</a></li>
                        <li class="nav-item pe-2"><a class="nav-link" href="{{route('manga.home')}}">Mangás</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <hr style="margin-top: -21px; margin-bottom: 2rem;">
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
