<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <style>
        div#popup {
            z-index: 1;
            display: none;
        }
    </style>
</head>
<body>
    @if(session('success'))
        <div class="alert alert-success w-25 p-3 text-center">
            {{ session('success') }}
        </div>
    @endif
    @include('layouts.header')
    <h1 class="">Liste des articles</h1>
    {{-- <a class="btn btn-primary m-3" href="{{ route('articles.index') }}">Liste des articles</a> --}}
    <a class="btn btn-primary mt-4" href="{{ route('articles.create') }}">Ajouter un article</a>
    <a class="btn btn-primary mt-4" href="{{ route('articles.search') }}">Rechercher un article</a>
    <table class="table table-striped w-100" style="margin-top: 70px;">
        <tr>
            <th>ID</th>
            <th>DESIGNATION</th>
            <th>PRIX</th>
            <th>QUANTITE</th>
            <th>Image</th>
            <th>ACTIONS</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    @forelse ($articles as $article)
        <tr>
            <td>{{ $article['id'] }}</td>
            <td>{{ $article['designation'] }}</td>
            <td>{{ $article['prix'] }}</td>
            <td>{{ $article['quantite'] }}</td>
            <td>                    <img src="{{ asset('images/'. $article->image) }}" height="100" width="200">
            </td>
            <td><a class="btn btn-primary" href="{{ route('articles.show', $article['id']) }}">Afficher</a></td>
            <td><a class="btn btn-warning" href="{{ route('articles.edit', $article['id']) }}">Modifier</a></td>
            <td>
                <form id="deleteForm{{ $article['id'] }}" action="{{ route('articles.destroy', $article['id']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</button>
                </form>
            </td>
    
            </td>
        </tr>
        @empty
        <!-- Handle case when there are no articles -->
    @endforelse
    </table>
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <script src="{{ asset('jquery/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>

