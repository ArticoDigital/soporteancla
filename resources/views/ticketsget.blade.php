@extends('layouts.layout')

@section('content')

    <div class="row justify-between middle-items m-t-16 m-b-16">
        <div class="col-6 col-l-1"><h2 class="">Tickets</h2></div>
        <div class="Filters row  col-16 col-l-15 middle-items justify-end">
            <form method="GET" id="FiltersForm" class="row col-16 col-m-14  justify-end" action="{{route('filterticketsget')}}">
                <label class="col-15 col-m-1 m-r-12 " for="">
                    <input type="number" placeholder="ID" name="id" value="{{$inputs['id']}}">
                </label>
                <label class="col-15 col-m-3 m-r-12 " for="">
                    <input type="text" placeholder="Nombre" name="name" value="{{$inputs['name']}}">
                </label>
                <label class="col-15 col-m-3 m-r-12 " for="">
                    <select class="col-16 m-r-12" name="category" id="">
                        <option value="0" {{(!isset($inputs['category']))?'selected':''}}>Seleccione una categoría</option>
                        @foreach($categories as $category)
                            <option @if(isset($inputs['category'])) {{ ($inputs['category'] == $category->id)?'selected':'' }} @endif  value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </label>
                <label class="col-15 col-m-3 m-r-12 " for="">
                    <select class="col-16 m-r-12" name="state" id="">
                        <option value="0" {{(!isset($inputs['state']))?'selected':''}}>Todos los estados
                        </option>
                        @foreach($states as $state)
                            <option @if(isset($inputs['state'])) {{ ($inputs['state'] == $state->id)?'selected':'' }} @endif  value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                </label>
                <label class="col-15 col-m-3 m-r-12 ">
                    <input class="dates" type="text" name="dates"
                                                   value="{{(isset($inputs['dates']))?$inputs['dates']:''}}"
                                                   placeholder="Seleccione rango de fechas"></label>
                <div class="  col-15 col-m-2 row Filters-submit  justify-center ">
                    <button class="Filters-button" type="submit"><i class="fas fa-sliders-h"></i></button>
                </div>
            </form>

            <button class="Filters-downloadButton" id="downloadExcelButton">
                <img src="{{asset('images/file-excel-regular.svg')}}" alt="">
            </button>
        </div>

    </div>

    <ul class="is-list-less  Items">
        @foreach($tickets as $ticket)
            <li class="Items-wrapper row middle-items">
                <div class="col-1 row justify-center">
                    <div class=" Status-indicator {{$ticket->ticketState->nameClass()}}"></div>
                </div>
                <div class="col-5 col-l-2 is-text-center">{{$ticket->name}}</div>
                <div class="col-10 col-l-3 is-text-center hide-phone">{{$ticket->sell_point}}</div>
                <div class="col-5 col-l-3   is-text-center">{{$ticket->subject}}</div>
                <div class="col-1 col-l-3  is-text-center">{{$ticket->id}}</div>
                <div class="col-2 col-l-2 hide-phone is-text-center">{{optional($ticket->user)->name}}</div>
                <div class="col-10 col-l-1 hide-phone is-text-center">{{($ticket->invoice_cost!="")? '$'.number_format($ticket->invoice_cost, 0):''}}</div>
                <div class="col-4 col-l-1 row justify-end middle-items">
                    <a href="{{route('ticket',[$ticket->id])}}"><i class="fas fa-edit "></i></a>
                </div>
            </li>
        @endforeach
    </ul>

    {{ $tickets->appends(Request::except('page'))->links() }}
    <form action="{{route('downloadExcel')}}"  id="downloadExcel"></form>

@endsection
