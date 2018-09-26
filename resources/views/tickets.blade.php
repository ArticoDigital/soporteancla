@extends('layouts.layout')

@section('content')
    <div class="row justify-between middle-items m-t-16 m-b-16">
        <div class="col-6"><h2 class="">Tickets</h2></div>
        <form  class="Filters row col-10 middle-items justify-end">
            <label class="col-4 m-r-12" for="">
                <select class="col m-r-12" name="" id="">
                    <option value="">Selecione un estado</option>
                    <option value="">Abierto</option>
                    <option value="">Cerrado</option>
                </select>
            </label>
            <label class="m-r-12 col-8 "><input class="dates" type="text" placeholder="Seleccione rango de fechas"></label>
            <div class=" Filters-submit col-2 row justify-center ">
                <button class="Filters-button" type="submit"><i class="fas fa-sliders-h"></i></button>
            </div>
        </form>
    </div>
    <ul class="is-list-less  Items">
        <li class="Items-wrapper row middle-items">
            <div class="col-1 row justify-center">
                <div class=" Status-indicator active"></div>
            </div>
            <div class="col-2 is-text-center">Juan Ramos</div>
            <div class="col-3 is-text-center">Dalo caja fuerte</div>
            <div class="col-4  is-text-center">Servicio Caja Fuerte</div>
            <div class="col-3  is-text-center">juan2ramos@gmail.com</div>
            <div class="col-2 is-text-center">No asignado</div>
            <div class="col-1 row justify-end middle-items">
                <a href="{{route('ticket')}}"><i class="fas fa-edit "></i></a>
            </div>
        </li>
    </ul>
@endsection
