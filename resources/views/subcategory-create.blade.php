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
    <h2 class="m-t-40">Crear Subcategoría - {{$category->name}}</h2>
    <div class="User Category">
        <form method="post" action="{{route('subcategoryStore',$category->id)}}"  class="row  justify-between">
            @csrf
            <div class="col-l-8 col-16 p-r-20">
                <input type="text" name="name" placeholder="Nombre" value="{{old('name')}}" required>
                <input type="text" name="description" placeholder="Descripción" value="{{old('description')}}">
            </div>
            <div class="col-l-8 col-16  p-l-20">
              <input type="hidden" name="service_category_id" value="{{$category->id}}">
                <select name="isActive" id="" required>

                    <option value="1"
                            {{(old('isActive')  == '1')?'selected':''}}
                    >Activo</option>
                    <option value="0"
                            {{(old('isActive') == '0')?'selected':''}}
                    >Inactivo</option>
                </select>
            </div>
            <div class="col-l-8 col-16 row justify-center justify-start-m m-t-20">
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>


@endsection
