@extends('layouts.layout')

@section('content')

@if ($errors->any())
    <div class="alert-error">
        <ul class="Error-ul is-list-less">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        <span class="Error-close"><i class="far fa-times-circle"></i></span>
    </div>
@endif


@if (\Session::has('messageok'))
    <div class="alert-success">
        <ul>
            <li>{!! \Session::get('messageok') !!}</li>
        </ul>
    </div>
@endif


    <h2 class="m-t-40">Usuario: {{$user->name}}</h2>
    <div class="User">
        <form method="post" action="{{route('userUpdate',$user->id)}}"  class="row  justify-between">
            @csrf
            <div class="col-8 p-r-20">
                <input type="text" name="name" placeholder="Nombre" value="{{$user->name}}">
                <input type="text" name="identification" placeholder="Cédula" value="{{$user->identification}}">
                <input type="email" name="email" placeholder="E-Mail"
                       value="{{$user->email}}">
            </div>
            <div class="col-8 p-l-20">
                <input type="password" name="password" placeholder="Contraseña">
                <select name="role" id="">
                    <option value="">Seleccione un rol</option>
                    <option value="Admin"
                            {{($user->roles->first()->name == 'Admin')?'selected':''}}
                    >Administrador</option>
                    <option value="Support"
                            {{($user->roles->first()->name == 'Support')?'selected':''}}
                    >Soporte</option>
                </select>
            </div>
            <div class="col-8 m-t-20">
                <button type="submit">Actualizar usuario</button>
            </div>
        </form>
    </div>
    <div class="row justify-between middle-items m-t-40 m-b-16">
        <div class="col-6"><h2 class="">Tickets</h2></div>
        <form class="Filters row col-10 middle-items justify-end">
            <label class="col-4 m-r-12" for="">
                <select class="col m-r-12" name="" id="">
                    <option value="">Selecione un estado</option>
                    <option value="">Abierto</option>
                    <option value="">Cerrado</option>
                </select>
            </label>
            <label class="m-r-12 col-8 "><input class="dates" type="text"
                                                placeholder="Seleccione rango de fechas"></label>
            <div class=" Filters-submit col-2 row justify-center ">
                <button class="Filters-button" type="submit"><i class="fas fa-sliders-h"></i></button>
            </div>
        </form>
    </div>
    <ul class="is-list-less  Items">

        @foreach($user->tickets as $ticket)
            <li class="Items-wrapper row middle-items">
                <div class="col-1 row justify-center">
                    <div class=" Status-indicator active"></div>
                </div>
                <div class="col-2 is-text-center">{{$ticket->name}}</div>
                <div class="col-3 is-text-center">{{$ticket->email}}</div>
                <div class="col-3 is-text-center">{{$ticket->subject}}</div>
                <div class="col-4 is-text-center">{{$ticket->ServiceSubcategory->name}}</div>
                <div class="col-2 is-text-center">{{$ticket->company}}</div>
                <div class="col-1 row justify-end middle-items">
                    <a href="{{route('ticket',[$ticket->id])}}"><i class="fas fa-edit "></i></a>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
