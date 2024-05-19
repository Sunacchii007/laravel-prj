<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rechercher Article</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>
<body class="d-flex align-items-center flex-column justify-content-center">
    @include('layouts.header')
    <h1>rechercher un article</h1>
    <form style="margin-top: 100px;" class="form w-50" method="POST" action="{{ route('articles.find') }}">
        @csrf
        <label class="m-2" for="id">ID : </label>
        <input class="form-control m-2" type="text" name="id" id="id" value="@php
            if(isset($article))
            echo($article->id);
        @endphp"/>
        <span class="d-flex align-content-end justify-content-end">
            <input class="btn btn-primary m-2" type="submit" value="Rechercher"/>
            <input class="btn btn-danger m-2" type="reset" value="Réinitialiser"/>
            <a class="btn btn-dark m-2" href="{{ route('articles.index') }}">Annuler</a>
        </span>
    </form>
    @if(session('fail'))
    <div class="alert alert-danger w-25 p-3 text-center">
        {{ session('fail') }}
    </div>
    @endif
    <!-- Results Section -->
    @if(isset($article))
    <div class="mt-4 w-50">
        {{-- @if($article) --}}
        <div class="alert alert-success w-25">Article trouvé : {{ $article['id'] }}</div>
        <table class="table table-light">
            <tr>
                <th>ID</th>
                <td>{{ $article['id'] }}</td>
            </tr>
            <tr>
                <th>DESIGNATION</th>
                <td>{{ $article['designation'] }}</td>
            </tr>
            <tr>
                <th>PRIX</th>
                <td>{{ $article['prix'] }}</td>
            </tr>
            <tr>
                <th>Quantite</th>
                <td>{{ $article['quantite'] }}</td>
            </tr>
            <tr>
                <th>Image</th>
                <td><img src="{{ asset('images/'. $article->image) }}" height="100" width="200"></td>
            </tr>
        </table>
        
    </div>
    @endif
</body>
</html>
