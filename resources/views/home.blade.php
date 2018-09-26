@extends('layouts.layout')

@section('content')

        <form action="" class="Login row justify-center middle-items">
            <div class="Login-container">
                <h1>Iniciar sesión</h1>
                <input type="text" placeholder="Email">
                <input type="password" placeholder="Contraseña">
                <div class="row justify-end">
                    <button type="submit">INGRESAR</button>
                </div>
            </div>
        </form>
@endsection
