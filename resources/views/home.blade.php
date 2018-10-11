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
    <form method="POST" class="Login row justify-center middle-items" action="{{ route('login') }}">
        @csrf
        <div class="Login-container">
            <h1>Iniciar sesión</h1>
            <input type="text" name="email" placeholder="Email" value="{{old('email')}}">
            <input type="password" name="password" placeholder="Contraseña">
            <div class="row justify-end">
                <button type="submit">INGRESAR</button>
            </div>
        </div>
    </form>
@endsection
