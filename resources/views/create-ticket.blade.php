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
    <div class="position-relative m-t-40">
        <button class="Banner-button">Ingresa tu solicitud</button>
        <figure class="Banner-principal row justify-center align-end">
            <img id="arrowToScroll" class="Banner-principalArrow  animated bounce"
                 src="{{asset('images/angle-down-solid.svg')}}" alt="">
            <img src="{{asset('images/slide.jpg')}}" alt="">
        </figure>
    </div>
    <form class="Request row justify-center m-t-40" method="POST" enctype="multipart/form-data"
          action="{{route('storeticket')}}">
        @csrf
        <div class="Login-container">
            <h1 class="target">¿Cómo puedo ayudarle?</h1>
            <div class="row">
                <div class="col-16 col-m-8 col-l-8  p-l-20 p-r-20">
                    <input type="text" value="{{date("d-m-Y")}}" disabled>

                    <input type="text" name="company" placeholder="Razón social o empresa" required maxlength="100"
                           value="{{old('company')}}">
                    <input type="text" name="regional" placeholder="Regional (Opcional)" required maxlength="100"
                           value="{{old('regional')}}">
                    <input type="text" name="sell_point" placeholder="Punto de venta" required maxlength="100"
                           value="{{old('sell_point')}}">
                    <input type="text" name="operation_center" placeholder="Centro de operación"
                           maxlength="150" value="{{old('operation_center')}}">

                    <input type="text" name="address" placeholder="Dirección" required maxlength="100"
                           value="{{old('address')}}" class="col" style="margin-right: 6px">

                    <select class="m-t-16" name="city_id" id="cities" required>
                        <option value="">Seleccione Ciudad</option>
                        @foreach($cities as $city)
                            <option {{old('city_id') == $city->id ? 'selected':''}} value="{{$city->id}}">{{$city->municipio}}
                                - {{$city->region}}</option>
                        @endforeach
                    </select>

                    <input id="otherForm" class="{{old('city_id') == 1124?'':'is-hidden'}}" type="text" name="city_text"
                           placeholder="¿Cuál?" value="{{old('city_text')}}">


                </div>
                <div class="col-16 col-m-8 col-l-8  p-l-20 p-r-20">
                    <input type="text" name="name" placeholder="Nombre" required maxlength="100"
                           value="{{old('name')}}">
                    <input type="text" name="identification" placeholder="Cédula o NIT" required maxlength="50"
                           value="{{old('identification')}}">
                    <input type="email" name="email" placeholder="E-mail" required value="{{old('email')}}">
                    <input type="text" name="cellphone" placeholder="Celular" required maxlength="20"
                           value="{{old('cellphone')}}">
                    <input type="hidden" name="subject" value="--">


                    <select data-json="{{$categories}}" name="service_category_id" id="service_category_id" required>
                        <option value="">Asunto: (Seleccione una categoría)</option>
                        @foreach($categories as $category)
                            <option {{old('service_category_id') == $category->id ? 'selected':''}}  value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>

                    <select class="m-t-16" data-old="{{old('service_subcategory_id')}}" name="service_subcategory_id"
                            id="service_subcategory" disabled required>
                        <option value="">Seleccione una subcategoría</option>
                    </select>

                    <select class="m-t-16 is-hidden" name="type_category" id="type_category">
                        <option value="">Seleccione una trasportadora</option>
                        <option {{old('type_category') == 'ATLAS' ? 'selected':''}} value="ATLAS">ATLAS</option>
                        <option {{old('type_category') == 'TVS' ? 'selected':''}} value="TVS">TVS</option>
                        <option {{old('type_category') == 'BRINKS' ? 'selected':''}} value="BRINKS">BRINKS</option>
                        <option {{old('type_category') == 'PROSEGUR' ? 'selected':''}} value="PROSEGUR">PROSEGUR
                        </option>
                        <option {{old('type_category') == 'G4S' ? 'selected':''}} value="G4S">G4S</option>
                    </select>
                    <select class="m-t-16 is-hidden" id="album" name="album">
                        <option value="">Actualización de albúm de tripulación ?</option>
                        <option {{old('album') == 'si' ? 'selected':''}}value="si">Si</option>
                        <option {{old('album') == 'no' ? 'selected':''}} value="no">No</option>
                    </select>
                    <select class="m-t-16 is-hidden" id="spreadsheets" name="spreadsheets">
                        <option value="">Solicitud de planillas ?</option>
                        <option {{old('spreadsheets') == 'si' ? 'selected':''}} value="si">Si</option>
                        <option {{old('spreadsheets') == 'no' ? 'selected':''}} value="no">No</option>
                    </select>

                    <input type="text" value="{{old('otherType')}}" placeholder="Otro" name="otherType" id="otherType"
                           class="is-hidden">

                </div>
                <div class="col-16 p-l-20 p-r-20 m-t-20">
                    <textarea required name="request" id="" cols="30" rows="10"
                              placeholder="Escriba su solicitud">{!! old('request') !!}</textarea>
                    <!--<div class="m-t-20">
                        <label for="file">Si cuenta con un archivo o imagen que describa el problema, por favor adjúntelo </label>
                        <input type="file" id="file" class="Request-file" name="file2" placeholder="Elija un documento ">
                    </div>-->
                    <input name="habeas_data" id="habeas_data" type="checkbox" required>
                    <label for="habeas_data" class="m-t-16 m-b-20">
                        <span>Acepto la <a
                                    href="https://www.ancla.la/wp-content/uploads/2017/02/politica_general_privacidad.pdf"
                                    target="_blank"> política de privacidad</a> , <a
                                    href="https://www.ancla.la/wp-content/uploads/2017/02/Habeas-data.pdf"
                                    target="_blank">términos y condiciones</a> y el uso de mis datos con fines comerciales.</span>
                    </label>
                </div>

            </div>
            <button class="m-t-16">Enviar Ticket</button>
        </div>

    </form>
@endsection
