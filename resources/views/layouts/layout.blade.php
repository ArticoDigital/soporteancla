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
    <div class="container Header-container row justify-end" id="Header-container">
        <figure class="Header-logo">
            <img class="Header-logoImage" src="{{asset('images/logo_ancla_blanco.png')}}" alt="">
        </figure>
        @if(auth()->check())
            <nav class="Header-nav">
                <ul class="row is-list-less">
                    <li><a href="{{route('tickets')}}"> <i class="fa fa-check"></i>Tickets</a></li>
                    @hasrole('Admin')
                    <li><a href="{{route('users')}}"> <i class="fa fa-users"></i>Usuarios</a></li>
                    <li><a href="{{route('categories')}}"> <i class="fa fa-boxes"></i>Categorias</a></li>
                    @endhasrole
                    <li><a href="{{route('profile')}}"> <i class="fa fa-user"></i>Mi Perfil</a></li>
                    <li><a href="{{route('logout')}}"> <i class="far fa-arrow-alt-circle-left"></i>Salir</a></li>
                </ul>
            </nav>
            <div class="mobile-menuLine" id="ButtonMenu">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <nav class="HeaderNavMobile row middle-items " id="HeaderNavMobile">
                <ul class="is-list-less is-full-width">
                    <li><a href="{{route('tickets')}}"> <i class="fa fa-check"></i>Tickets</a></li>
                    @hasrole('Admin')
                    <li><a href="{{route('users')}}"> <i class="fa fa-users"></i>Usuarios</a></li>
                    <li><a href="{{route('categories')}}"> <i class="fa fa-boxes"></i>Categorias</a></li>
                    @endhasrole
                    <li><a href="{{route('profile')}}"> <i class="fa fa-user"></i>Mi Perfil</a></li>
                    <li><a href="{{route('logout')}}"> <i class="far fa-arrow-alt-circle-left"></i>Salir</a></li>

                </ul>
            </nav>
        @endif
    </div>

</header>

<main class="Main container {{Route::current()->uri }} ">
    @yield('content')
</main>
<footer class="Footer">
    Cajas Fuertes Ancla S.A.S. Nit 860067604-7. Todos los derechos reservados
</footer>
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
