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
    <h2 class="m-t-40">Crear usuario</h2>
    <div class="User">
        <form method="post" action="{{ route('userStore') }}">
            @csrf
            <div class="row  justify-between">
                <div class="col-8 p-r-20">
                    <input type="text" name="name" placeholder="Nombre" value="{{old('name')}}" required>
                    <input type="text" name="identification" placeholder="Cédula" value="{{old('identification')}}" required>
                    <input type="email" name="email" placeholder="E-Mail" value="{{old('email')}}" required>
                </div>
                <div class="col-8 p-l-20">
                    <input type="password" name="password" placeholder="Contraseña" required>
                    <select name="role" id="" required>
                        <option value="">Seleccione un rol</option>
                        <option value="Admin">Administrador</option>
                        <option value="Support">Soporte</option>
                    </select>
                </div>
                <div class="col-8 m-t-20">
                    <button type="submit">Crear</button>
                </div>
            </div>
        </form>
    </div>
@endsection
