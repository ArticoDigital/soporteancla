@extends('layouts.layout')

@section('content')

    <form action="" class="Login row justify-center m-t-60">
        <div class="Login-container">
            <h1>¿Cómo puedo ayudarle?</h1>
            <input type="text" name="name" placeholder="Nombre">
            <input type="text" name="company" placeholder="Empresa">
            <input type="text" name="cellphone" placeholder="Celular">
            <input type="email" name="email" placeholder="E-mail">
            <input type="text" name="identification" placeholder="Cédula o NIT">
            <input type="text" name="sell_point" placeholder="Punto de venta">
            <input type="text" name="operation_center" placeholder="Centro de operación">
            <label class="m-b-16" for="service_category">Categoría de servicio</label>
            <select name="service_category" id="service_category">
                <option value="0">Seleccione</option>
            </select>
            <textarea class="m-t-20" name="request" id="" cols="30" rows="10" placeholder="Solicitud"></textarea>
            <button class="m-t-16">Enviar Ticket</button>
        </div>
    </form>
@endsection
