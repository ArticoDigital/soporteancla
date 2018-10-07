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
    <h2 class="m-t-40">{{$subcategory->name}}</h2>
    <div class="User Subcategory">
        <form method="post" action="{{route('subcategoryUpdate',$subcategory->id)}}"  class="row  justify-between">
            @csrf
            <div class="col-8 p-r-20">
                <input type="text" name="name" placeholder="Nombre" value="{{$subcategory->name}}" required>
                <input type="text" name="description" placeholder="Cédula" value="{{$subcategory->description}}">
            </div>
            <div class="col-8 p-l-20">
              <input type="hidden" name="id" value="{{$subcategory->id}}">
                <select name="isActive" id="" required>
                    <option value="0"
                            {{($subcategory->isActive == '0')?'selected':''}}
                    >Iactivo</option>
                    <option value="1"
                            {{($subcategory->isActive == '1')?'selected':''}}
                    >Activo</option>
                </select>
            </div>
            <div class="col-8 m-t-20">
                <button type="submit">Actualizar subcategoría</button>
            </div>
        </form>
    </div>





@endsection
