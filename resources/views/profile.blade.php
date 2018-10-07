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

    <h2 class="m-t-40">Mi perfil</h2>
    <div class="User">
      <form method="post" action="{{route('profileUpdate')}}"  class="row  justify-between">
          @csrf
        
            <div class="col-8 p-r-20">
                <input type="text" name="name" placeholder="Nombre" value="{{$user->name}}">
                <input type="text" name="identification" placeholder="Cédula" value="{{$user->identification}}">

            </div>
            <div class="col-8 p-l-20">
                <input type="email" name="email" placeholder="E-Mail" value="{{$user->email}}">
                <input type="password" name="password" placeholder="Contraseña">
            </div>
            <div class="col-8 m-t-20">
                <button type="submit">Actualizar</button>
            </div>

        </form>
    </div>
@endsection
