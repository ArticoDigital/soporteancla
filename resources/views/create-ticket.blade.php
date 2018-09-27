@extends('layouts.layout')

@section('content')

    <form class="Request row justify-center m-t-20" method="POST">
        <div class="Login-container">
            <h1>¿Cómo puedo ayudarle?</h1>
            <div class="row">
                <div class="col-8 p-r-20">
                    <input type="text" name="name" placeholder="Nombre">
                    <input type="text" name="company" placeholder="Empresa">
                    <input type="text" name="cellphone" placeholder="Celular">
                    <input type="email" name="email" placeholder="E-mail">
                    <input type="text" name="subject" placeholder="Asunto">
                </div>
                <div  class="col-8 p-l-20">
                    <input type="text" name="identification" placeholder="Cédula o NIT">
                    <input type="text" name="sell_point" placeholder="Punto de venta">
                    <input type="text" name="operation_center" placeholder="Centro de operación">
                    <label class="m-b-16" for="service_category">Categoría de servicio</label>
                    <select name="service_category" id="service_category">
                        <option value="0">Seleccione</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>

                </div>
                <textarea  name="request" id="" cols="30" rows="10" placeholder="Escribe tu solicitud"></textarea>
            </div>
            <button class="m-t-16">Enviar Ticket</button>
        </div>
    </form>
@endsection
