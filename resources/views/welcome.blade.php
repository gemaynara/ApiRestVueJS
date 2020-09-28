<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Banco Capgemini</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>

<body>
<div id="app">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Banco Capgemini</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#/saldo">Verificar Saldo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#/extrato">Ver Extrato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#/saque">Realizar Saque</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#/deposito">Realizar Depósito</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        <router-view></router-view>
    </div>


</div>

<script src="{{asset('/js/app.js')}}"></script>
</body>


</html>
