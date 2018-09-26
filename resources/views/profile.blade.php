@extends('layouts.layout')

@section('content')
    <h2 class="m-t-40">Mi perfil</h2>
    <div class="User">
        <div class="row  justify-between">
            <div class="col-8 p-r-20">
                <input type="text" name="name" placeholder="Nombre" value="Juan Ramos">
                <input type="text" name="identification" placeholder="Cédula" value="80921243214">

            </div>
            <div class="col-8 p-l-20">
                <input type="email" name="email" placeholder="E-Mail" value="juan2ramos@gmail.com">
                <input type="password" name="Contraseña" placeholder="Contraseña">
            </div>
            <div class="col-8 m-t-20">
                <button type="submit">Actualizar</button>
            </div>
        </div>
    </div>
@endsection
