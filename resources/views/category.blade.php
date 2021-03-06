@extends('layouts.layout')

@section('content')
    @if(Session::has('message'))
        <div class="{{Session::get('message')['type']}}">{{Session::get('message')['message']}}</div>
    @endif
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
    @if (! empty($messageok))
        <div class="alert-success">
            {{$messageok}}
        </div>
    @endif
    <h2 class="m-t-40">Categoría: {{$category->name}}</h2>
    <div class="User Category">
        <form method="post" action="{{route('categoryUpdate',$category->id)}}" class="row  justify-between">
            @csrf
            <div class="col-16 col-l-8 p-r-20">
                <input type="text" name="name" placeholder="Nombre" value="{{$category->name}}" required>
                <input type="text" name="description" placeholder="Descripción" value="{{$category->description}}">
            </div>
            <div class="col-16 col-l-8 p-l-20">

              <input type="hidden" name="id" value="{{$category->id}}">
                <select name="isActive" class=" m-t-16" id="" required>

                    <option value="0"
                            {{($category->isActive == '0')?'selected':''}}
                    >Inactivo
                    </option>
                    <option value="1"
                            {{($category->isActive == '1')?'selected':''}}
                    >Activo
                    </option>
                </select>
            </div>
            <div class="col-16 col-l-8 row justify-center  justify-start-m  m-t-20">
                <button type="submit">Actualizar categoría</button>
            </div>
        </form>
    </div>


    <div class="col-12 row m-t-40 m-b-40">
        <h3 class="col-l-4 col-16">Subcategorías</h3><a href="{{route('subcategoryCreate',$category->id)}}" class="button">Crear
            Subcategoria <i class="fas fa-boxes "></i></a>
    </div>

    <ul class="is-list-less  Items">

        @foreach($subcategories as $subcategory)
            <li class="Items-wrapper row middle-items">
                <div class="col-1 row justify-center">
                    <div class=" Status-indicator {{($subcategory->isActive==1)? 'finalizado':'recibido'}}"></div>
                </div>
                <div class="col-7 col-l-6 is-text-center">{{$subcategory->name}}</div>
                <div class="col-6 col-l-6 iis-text-center">{{$subcategory->description}}</div>
                <div class="col-1 row justify-end middle-items">
                    <a href="{{route('subcategory',$subcategory->id)}}"><i class="fas fa-edit "></i></a>
                </div>
                <div class="col-1 row justify-end middle-items">
                    <form action="{{route('subcategoryDelete', $subcategory->id)}}" method="post" class="delete">
                        @csrf
                        @method('DELETE')
                        <a class="Users-delete" href=""><i class="fas fa-trash "></i></a>
                    </form>

                </div>

            </li>
        @endforeach
    </ul>



@endsection
