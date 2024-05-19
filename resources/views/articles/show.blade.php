<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Card</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>
<body class="d-flex align-items-center flex-column justify-content-center">
    @if(session('success'))
        <div class="alert alert-success w-25 p-3 text-center">
            {{ session('success') }}
        </div>
    @endif

    @include('layouts.header')
    <h1>Détails</h1>
    <table class="table table-light w-50" style="margin-top: 100px;">
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
            <td>
                    {{-- <img src="{{ asset($article['image']) }}" alt="{{ $article['designation'] }} Image" width="70px" height="70px"> --}}
                    <img src="{{ asset('images/'. $article->image) }}" height="100" width="200">

            </td>
            
        </tr>
    </table>
    <span class="w-50 d-flex align-content-end justify-content-end">
       
            <div class="modal fade" id="confirmDeleteModal{{ $article['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Confirmation de suppression</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body  d-flex flex-column align-items-center justify-content-center">
                            Êtes-vous sûr de vouloir supprimer cet article ?
                            <table class="table table-hover w-100">
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
                            </table>
                        </div>
                        <div class="modal-footer">
                            <form id="deleteForm{{ $article['id'] }}" action="{{ route('articles.destroy', $article['id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </form>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        </div>
                    </div>
                </div>
            </div>
        {{-- </td> --}}
        <a class="btn btn-primary m-2" href="{{ route('articles.index') }}">Retour a la liste des articles</a>
    </span>
    <script src="{{ asset('jquery/jquery-3.7.0.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>
</html>
