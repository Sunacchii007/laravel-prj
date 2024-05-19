{{-- <header> --}}
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light"> --}}
        <style>
            /* @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap'); */
    
        h1 {
        font-family: 'Bebas Neue', cursive;
        font-size: 3em;
        position: absolute;
        top: 15%;
        left: 50%;
        transform: translate(-50%,-50%);
        text-transform: capitalize;
        /* background-image: linear-gradient(gold, gold); */
        background-image: linear-gradient(#007BFF, #007BFF);
        background-size: 100% 10px;
        background-repeat: no-repeat;
        background-position: 100% 0%;
        transition: background-size .7s, background-position .5s ease-in-out;
        font-family: 'Times New Roman', Times, serif;
        color: #007BFF;
        cursor: pointer;
        }
    
        h1:hover {
        background-size: 100% 100%;
        background-position: 0% 100%;
        transition: background-position .7s, background-size .5s ease-in-out;
        color: #E3F2FD;
        }
    
        .alert {
            position: fixed;
            top: 95px;
            right: 0;
            z-index: 10;
            opacity: .8;
            animation: fadeOut 7s ease-in-out forwards;
        }
    
        @keyframes fadeOut {
        0% {
            opacity: 0.8;
        }
        100% {
            opacity: 0;
            visibility: hidden;
        }
    }
        </style>
        <nav class="navbar navbar-light mb-5 w-100" style="background-color: #e3f2fd;">
            <a class="nav-link" href="{{ route('articles.index') }}">Liste des articles</a>
            <a class="nav-link" href="{{ route('articles.create') }}">Ajouter un article</a>
            <a class="nav-link" href="{{ route('articles.search') }}">Rechercher un article</a>
            {{-- <a class="nav-link">Supprimer tous les articles</a> --}}
            <form class="form-inline" method="POST" action="{{ route('articles.find') }}">
                @csrf
                <input class="form-control mr-sm-2" name="id" id="id" type="text" placeholder="Rechercher" aria-label="Search">
                <input class="btn btn-outline-primary my-2 my-sm-0" type="submit" value="Rechercher">
            </form>
            <a class="nav-link" href="{{ route('auth.logout') }}">Deconnexion</a>
        </nav>
    {{-- </header> --}}
    