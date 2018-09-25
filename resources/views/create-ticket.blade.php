@extends('layouts.layout')

@section('content')

        <form action="" class="Login row justify-center middle-items">
            <div class="Login-container">
                <h1 class="Login-h1">¿Cómo puedo ayudarle?</h1>
                <input type="text" name="name" placeholder="Nombre">
                <input type="text" name="company" placeholder="Empresa">
                <input type="text" name="cellphone" placeholder="Celular">
                <input type="email" name="email" placeholder="E-mail">
                <input type="text" name="identification" placeholder="Cédula o NIT">
                <input type="text" name="sell-point" placeholder="Punto de venta">
                <input type="text" name="operation-center" placeholder="Centro de operación">
                <label  class="m-b-16" for="service-category">Categoría de servicio</label>
                <select name="service-category" id="service-category">
                    <option value="0">Seleccione </option>
                </select>
                <textarea class="m-t-20" name="request" id="" cols="30" rows="10" placeholder="Solicitud"></textarea>
            </div>
        </form>
@endsection
