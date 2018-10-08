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
    <div class="row justify-between middle-items m-t-16 m-b-16">
        <div class="col-6"><h2 class="">Categorias</h2></div>
    </div>
    <div class="row col-16 justify-between m-b-40">
        <div class="col-8 row  ">
            <a href="{{route('categoryCreate')}}" class="button">Crear Categoria <i class="fas fa-boxes "></i></a>
        </div>


    </div>


    <ul class="is-list-less  Items">
        @foreach($categories as $category)
            <li class="Items-wrapper row middle-items">
                <div class="col-2 is-text-center">{{$category->id}}</div>
                <div class="col-4 is-text-center">{{$category->name}}</div>
                <div class="col-4 is-text-center">{{$category->description}}</div>
                <div class="col-2  is-text-center">{{($category->isActive == '1')?'Activo':'Inactivo'}}</div>

                <div class="col-1 row justify-end middle-items">
                    <a href="{{route('category',$category->id)}}"><i class="fas fa-edit "></i></a>
                </div>
                <div class="col-1 row justify-end middle-items">
                    <form action="{{route('categoryDelete', $category->id)}}" method="post" class="delete">
                        @csrf
                        @method('DELETE')
                        <a class="Users-delete" href=""><i class="fas fa-trash "></i></a>
                    </form>

                </div>
            </li>
        @endforeach
    </ul>
@endsection
