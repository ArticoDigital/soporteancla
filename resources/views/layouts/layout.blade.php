<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">

    <meta name="description" content="">
    <meta name="author" content="juan2ramos">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') Ancla </title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">

</head>
<body data-site="{{env('APP_URL')}}" id="body">
<header class="Header row align-end">
    <div class="container Header-container row justify-between middle-items">
        <figure class="Header-logo">
            <img class="Header-logoImage" src="{{asset('images/logo_ancla_blanco.png')}}" alt="">
        </figure>
        <nav class="Header-nav">
            <ul class="row" >
                <li><a href="">Bienvenido Juan</a></li>
                <li><a href="">Tickets</a></li>
                <li><a href="">Perfil</a></li>
            </ul>
        </nav>
    </div>

</header>

<main class="Main container">
    @yield('content')
</main>
<footer class="Footer">
    Cajas Fuertes Ancla S.A.S. Nit 860067604-7. Todos los derechos reservados
</footer>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>