@extends('layouts.layout')

@section('content')
    <h2 class="m-t-40">{{$category->name}}</h2>
    <div class="User">
        <form method="post" action="{{route('categoryUpdate',$category->id)}}"  class="row  justify-between">
            @csrf
            <div class="col-8 p-r-20">
                <input type="text" name="name" placeholder="Nombre" value="{{$category->name}}">
                <input type="text" name="description" placeholder="Cédula" value="{{$category->description}}">

            </div>
            <div class="col-8 p-l-20">

                <select name="isActive" id="">
                    <option value="0"
                            {{($category->isActive == '0')?'selected':''}}
                    >Iactivo</option>
                    <option value="1"
                            {{($category->isActive == '1')?'selected':''}}
                    >Activo</option>
                </select>
            </div>
            <div class="col-8 m-t-20">
                <button type="submit">Actualizar</button>
            </div>
        </form>
    </div>
@endsection
