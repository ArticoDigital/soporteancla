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
    <div class=" m-t-40">
        <figure class="Banner-principal row justify-center align-end"
                style="background-image: url({{asset('images/banner.png')}})">
            <img  id="arrowToScroll" class="Banner-principalArrow  animated bounce" src="{{asset('images/angle-down-solid.svg')}}" alt="">
        </figure>
    </div>
    <form class="Request row justify-center m-t-40" method="POST" enctype="multipart/form-data" action="{{route('storeticket')}}">
        @csrf
        <div class="Login-container">
            <h1 class="target">¿Cómo puedo ayudarle?</h1>
            <div class="row">
                <div class="col-16 col-m-8 col-l-8  p-l-20 p-r-20">
                    <input type="text" name="name" placeholder="Nombre" required maxlength="100"
                           value="{{old('name')}}">
                    <input type="text" name="company" placeholder="Empresa" required maxlength="100"
                           value="{{old('company')}}">
                    <input type="text" name="address" placeholder="Dirección" required maxlength="100"
                           value="{{old('address')}}">
                    <input type="text" name="cellphone" placeholder="Celular" required maxlength="20"
                           value="{{old('cellphone')}}">
                    <input type="email" name="email" placeholder="E-mail" required value="{{old('email')}}">
                    <input type="text" name="subject" placeholder="Asunto" required maxlength="200"
                           value="{{old('subject')}}">
                </div>
                <div class="col-16 col-m-8 col-l-8  p-l-20 p-r-20">
                    <input type="text" name="identification" placeholder="Cédula o NIT" required maxlength="50"
                           value="{{old('identification')}}">
                    <input type="text" name="sell_point" placeholder="Punto de venta" required maxlength="100"
                           value="{{old('sell_point')}}">
                    <input type="text" name="operation_center" placeholder="Centro de operación"
                           maxlength="150" value="{{old('operation_center')}}">
                    <select data-json="{{$categories}}" name="service_category_id" id="service_category_id" required>
                        <option value="">Seleccione una categoría</option>
                        @foreach($categories as $category)
                            <option {{old('service_category_id') == $category->id ? 'selected':''}}  value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <select class="m-t-16" data-old="{{old('service_subcategory_id')}}" name="service_subcategory_id" id="service_subcategory" disabled required>
                        <option value="">Seleccione una subcategoría</option>
                    </select>
                    <select class="m-t-16" name="city_id" id="cities" required>
                        <option value="">Seleccione Ciudad o Municipio</option>
                        @foreach($cities as $city)
                            <option {{old('city_id') == $city->id ? 'selected':''}} value="{{$city->id}}">{{$city->municipio}} - {{$city->departamento}}</option>
                        @endforeach
                    </select>
                    <input id="otherForm" class="{{old('city_id') == 1124?'':'is-hidden'}}" type="text" name="city_text"
                           placeholder="¿Cúal?" value="{{old('city_text')}}">

                </div>
                <div class="col-16 p-l-20 p-r-20 m-t-20">
                    <textarea required name="request" id="" cols="30" rows="10"
                              placeholder="Escribe tu solicitud">{!! old('request') !!}</textarea>
                    <div class="m-t-20">
                        <label for="file">Elija un documento</label>
                        <input type="file" id="file" class="Request-file" name="file2" placeholder="Elija un documento ">
                    </div>
                    <input name="habeas_data" id="habeas_data" type="checkbox" required>
                    <label for="habeas_data" class="m-t-16 m-b-20">
                        <span>Acepto la <a
                                    href="https://www.ancla.la/wp-content/uploads/2017/02/politica_general_privacidad.pdf"
                                    target="_blank">política política de privacidad</a> , <a
                                    href="https://www.ancla.la/wp-content/uploads/2017/02/Habeas-data.pdf"
                                    target="_blank">terminos y condiciones</a> y el uso de mis datos con fines comerciales.</span>
                    </label>
                </div>

            </div>
            <button class="m-t-16">Enviar Ticket</button>
        </div>

    </form>
@endsection
