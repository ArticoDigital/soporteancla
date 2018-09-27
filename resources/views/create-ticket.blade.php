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
    <form class="Request row justify-center m-t-20" method="POST" action="{{route('storeticket')}}">
      @csrf
        <div class="Login-container">
            <h1>¿Cómo puedo ayudarle?</h1>
            <div class="row">
                <div class="col-8 p-r-20">
                    <input type="text" name="name" placeholder="Nombre" required  maxlength="100" value="{{old('name')}}">
                    <input type="text" name="company" placeholder="Empresa" required  maxlength="100" value="{{old('company')}}">
                    <input type="text" name="cellphone" placeholder="Celular" required  maxlength="20" value="{{old('cellphone')}}">
                    <input type="email" name="email" placeholder="E-mail" required value="{{old('email')}}">
                    <input type="text" name="subject" placeholder="Asunto" required  maxlength="200" value="{{old('subject')}}">
                </div>
                <div  class="col-8 p-l-20">
                    <input type="text" name="identification" placeholder="Cédula o NIT" required  maxlength="50" value="{{old('identification')}}">
                    <input type="text" name="sell_point" placeholder="Punto de venta" required  maxlength="100" value="{{old('sell_point')}}">
                    <input type="text" name="operation_center" placeholder="Centro de operación" required maxlength="150" value="{{old('operation_center')}}">
                    <label class="m-b-16" for="service_category">Categoría de servicio</label>
                    <select name="service_category_id" id="service_category_id" required>
                        <option value="">Seleccione</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>

                </div>
                <textarea required  name="request" id="" cols="30" rows="10" placeholder="Escribe tu solicitud">{!! old('request') !!}</textarea>
            </div>
            <button class="m-t-16">Enviar Ticket</button>
        </div>
    </form>
@endsection
