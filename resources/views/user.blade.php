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
            <div class="col-m-8 col-16 p-r-20">
                <input type="text" name="name" placeholder="Nombre" value="{{$user->name}}">
                <input type="text" name="identification" placeholder="Cédula" value="{{$user->identification}}">
                <input type="email" name="email" placeholder="E-Mail"
                       value="{{$user->email}}">
                <input type="text" name="phone" placeholder="Número de celular" value="{{$user->phone}}">

                <p>
                    <input type="checkbox" name="is_send_mail" id="test3" {{ $user->is_send_mail ? 'checked':''}} value="1">
                    <label for="test3">Enviar mail</label>
                </p>
            </div>
            <div class=" col-m-8 col-16 p- p-l-20">
                <input type="password" name="password" placeholder="Contraseña">
                <select name="role" id="">
                    <option value="">Seleccione un rol</option>
                    <option value="Admin"
                            {{(optional($user->roles->first())->name == 'Admin')?'selected':''}}
                    >Administrador</option>
                    <option value="Support"
                            {{(optional($user->roles->first())->name == 'Support')?'selected':''}}
                    >Soporte</option>
                </select>
                <select name="isActive" id="" style="margin: 1.6rem 0;">
                    <option value="1"
                            {{($user->isActive  == '1')?'selected':''}}
                    >Activo</option>
                    <option value="0"
                            {{($user->isActive == '0')?'selected':''}}
                    >Inactivo</option>
                </select>
                <input type="text" name="address" placeholder="Dirección de residencia"  value="{{$user->address}}">
            </div>
            <div class="col-m-8 col-16 m-t-20">
                <button type="submit">Actualizar usuario</button>
            </div>
        </form>
    </div>
    <div class="row justify-between middle-items m-t-40 m-b-16">
        <div class="col-6 col-l-6"><h2 class="">Tickets</h2></div>

        <form class="Filters row col-16 col-l-10 middle-items justify-end" method="GET" action="{{route('user',$user->id)}}">
            @csrf
            <label class="col-15 col-m-5 m-r-12" for="">
                <select class="col m-r-12" name="state" id="">
                    <option value="0" "{{(!isset($data['state']))?'selected':''}}">Todos los estados
                    </option>
                    @foreach($states as $state)
                        <option @if(isset($data['state'])) {{ ($data['state'] == $state->id)?'selected':'' }} @endif  value="{{$state->id}}">{{$state->name}}</option>
                    @endforeach

                </select>
            </label>
            <label class="m-r-12 col-15 col-m-5 "><input class="dates" type="text" name="dates"
                                                value="{{(isset($data['dates']))?$data['dates']:''}}"
                                                placeholder="Seleccione rango de fechas"></label>
            <div class=" Filters-submit col-15  col-m-2row justify-center ">
                <button class="Filters-button" type="submit"><i class="fas fa-sliders-h"></i></button>
            </div>
        </form>
    </div>
    <ul class="is-list-less  Items">
       @if(!isset($data['notickets']))
        @foreach($tickets as $ticket)
            <li class="Items-wrapper row middle-items">
                <div class="col-1 row justify-center  justify-start-m ">
                    <div class=" Status-indicator {{$ticket->ticketState->nameClass()}}"></div>
                </div>
                <div class="col-4 col-5 col-l-2 is-text-center">{{$ticket->name}}</div>
                <div class="col-6 col-l-3 is-text-center hide-phone " >{{$ticket->email}}</div>
                <div class="col-4  col-5 col-l-3 is-text-center">{{$ticket->subject}}</div>
                <div class="col-4 col-l-4 hide-phone is-text-center">{{$ticket->ServiceSubcategory->name}}</div>
                <div class="col-2 col-l-2 hide-phone is-text-center">{{$ticket->company}}</div>
                <div class="col-1  col-5 col-l-1 row justify-end middle-items">
                    <a href="{{route('ticket',[$ticket->id])}}"><i class="fas fa-edit "></i></a>
                </div>
            </li>
        @endforeach
        @endif
    </ul>
    {{ $tickets->appends(Request::except('page'))->links() }}

@endsection
