@extends('layouts.layout')

@section('content')
    <h2 class="m-t-40">Crear categoría</h2>
    <div class="User Category">
        <form method="post" action="{{route('categoryStore')}}"  class="row  justify-between">
            @csrf
            <div class="col-8 p-r-20">
                <input type="text" name="name" placeholder="Nombre" value="{{old('name')}}">
                <input type="text" name="description" placeholder="Descripción" value="{{old('description')}}">
            </div>
            <div class="col-8 p-l-20">
                <select name="isActive" id="">

                    <option value="1"
                            {{(old('isActive')  == '1')?'selected':''}}
                    >Activo</option>
                    <option value="0"
                            {{(old('isActive') == '0')?'selected':''}}
                    >Inactivo</option>
                </select>
            </div>
            <div class="col-8 m-t-20">
                <button type="submit">Guardar</button>
            </div>
        </form>
    </div>


@endsection
