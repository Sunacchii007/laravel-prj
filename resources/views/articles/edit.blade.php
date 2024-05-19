<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>New Article</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
</head>
<body class="d-flex align-items-center flex-column justify-content-center">
    @include('layouts.header')
    <h1>Modifier l'article</h1>
    <form style="margin-top: 100px;" class="form w-50" enctype="multipart/form-data" method="POST" action="{{ route('articles.update', $article['id']) }}">
        @csrf
        @method('PUT')
        <label class="m-2" for="designation">Designation : </label>
        <input class="form-control m-2" type="text" name="designation" id="designation" value="{{ $article['designation'] }}"/>
        @error('designation')
        <span class="text-danger"> *{{$message}} </span><br>
        @enderror
        <label class="m-2" for="prix">Prix : </label>
        <input class="form-control m-2" type="text" name="prix" id="prix" value="{{ $article['prix'] }}"/>
        @error('prix')
        <span class="text-danger"> *{{$message}} </span><br>
        @enderror
        <label class="m-2" for="quantite">Quantite : </label>
        <input class="form-control m-2" type="number" name="quantite" id="quantite" value="{{ $article['quantite'] }}"/>
        @error('quantite')
        <span class="text-danger"> *{{$message}} </span><br>
        @enderror
        <label class="col-form-label m-2" for="image">Image : </label>
        <input class="form-control m-2" type="file" name="image" id="image" value="{{old('image')}}" />
        @error('image')
            <span class="text-danger"> *{{$message}} </span><br>
        @enderror
        <span class="d-flex align-content-end justify-content-end">
            <input class="btn btn-success m-2" type="submit" value="Enregistrer les modifications"/>
            <input class="btn btn-danger m-2" type="reset" value="Annuler les modifications"/>
            <a class="btn btn-primary m-2" href="{{ route('articles.index') }}">Retour a la liste des articles</a>
        </span>
    </form>
</body>
</html>
