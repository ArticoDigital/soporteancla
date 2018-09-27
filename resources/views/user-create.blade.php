@extends('layouts.layout')

@section('content')
    <h2 class="m-t-40">Crear usuario</h2>
    <div class="User">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="row  justify-between">
                <div class="col-8 p-r-20">
                    <input type="text" name="name" placeholder="Nombre">
                    <input type="text" name="identification" placeholder="Cédula">
                    <input type="email" name="email" placeholder="E-Mail">
                </div>
                <div class="col-8 p-l-20">
                    <input type="password" name="Contraseña" placeholder="Contraseña">
                    <select name="" id="">
                        <option value="">Seleccione un rol</option>
                    </select>
                </div>
                <div class="col-8 m-t-20">
                    <button type="submit">Enviar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
