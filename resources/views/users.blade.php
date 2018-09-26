@extends('layouts.layout')

@section('content')
    <div class="row justify-between middle-items m-t-16 m-b-16">
        <div class="col-6"><h2 class="">Usuarios</h2></div>
    </div>
    <div class="row col-16 justify-between m-b-40">
        <div class="col-8 row  ">
            <a href="{{route('userCreate')}}" class="button">Crear Administrador <i class="fas fa-user-plus "></i></a>
        </div>
        <form class=" col-8 row justify-end">
            <label class="col-10" for="">
                <input type="text" placeholder="Ingresa un término a buscar">
            </label>
            <div class=" Filters-submit col-2 row justify-center ">
                <button class="Filters-button" type="submit"><i class="fas fa-search"></i></button>
            </div>
        </form>

    </div>
    <ul class="is-list-less row Users">
        <li><a class="Users-links active" href="">Administradores</a></li>
        <li><a class="Users-links" href="">Clientes</a></li>
    </ul>

    <ul class="is-list-less  Items">
        <li class="Items-wrapper row middle-items">
            <div class="col-2 is-text-center">Juan Ramos</div>
            <div class="col-3 is-text-center">Ártico Digital</div>
            <div class="col-3  is-text-center">92031323-1</div>
            <div class="col-3  is-text-center">300 5549372</div>
            <div class="col-3  is-text-center">juan2ramos@gmail.com</div>
            <div class="col-1 row justify-end middle-items">
                <a href="{{route('user')}}"><i class="fas fa-user-edit "></i></a>
            </div>
            <div class="col-1 row justify-end middle-items">
                <a class="Users-delete" href=""><i class="fas fa-user-times "></i></a>
            </div>
        </li>
    </ul>
@endsection
