<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <style>
        h1 {
            font-family: 'Bebas Neue', cursive;
            font-size: 3em;
            position: absolute;
            top: 15%;
            left: 50%;
            transform: translate(-50%,-50%);
            text-transform: capitalize;
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

        .text-red {
            color: red;
        }

        .border-red {
            border-color: red;!important
        }
    </style>
</head>
<body class="d-flex align-items-center flex-column justify-content-center">
    @if(session('msg'))
        <div class="alert alert-danger w-25 p-3 text-center">
            {{ session('msg') }}
        </div>
    @endif
    <h1>Connexion</h1>
    <form style="margin-top: 100px;" class="form w-50" method="POST" action="{{ route('auth.login') }}">
        @csrf
        <label class=" m-2 float-left" for="login">Login : </label>
        <input class="form-control m-2 @error('login') border border-red @enderror" type="text" name="login" id="login"/>
        @error('login')
            <div class="p-3 text-center text-red">
                Invalid login
            </div>
        @enderror
        <label class="col-form-label m-2" for="password">Password : </label>
        <input class="form-control m-2 @error('password') border border-red @enderror" type="password" name="password" id="password"/>
        @error('password')
            <div class="p-3 text-center text-red">
                Invalid password
            </div>
        @enderror
        <span class="d-flex align-content-end justify-content-end">
            <input class="btn btn-primary m-2" type="submit" value="Connexion"/>
            <input class="btn btn-danger m-2" type="reset" value="Réinitialiser"/>
        </span>
    </form>
</body>
</html>
