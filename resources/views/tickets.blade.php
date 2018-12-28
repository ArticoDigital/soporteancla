@extends('layouts.layout')

@section('content')

    <div class="row justify-between middle-items m-t-16 m-b-16">
        <div class="col-6 col-l-6"><h2 class="">Tickets</h2></div>
        <div class="Filters row  col-16 col-l-10 middle-items justify-end">

            <form method="GET" id="FiltersForm" class="row col-16 col-m-13  justify-end" action="{{route('filterticketsget')}}">
                @csrf
                <label class="col-15 col-m-5 m-r-12 " for="">
                    <select class="col-16 m-r-12" name="state" id="">
                        <option {{(!isset($data['state']))?'selected':''}} value="0">Todos los estados
                        </option>
                        @foreach($states as $state)
                            <option @if(isset($data['state'])) {{ ($data['state'] == $state->id)?'selected':'' }} @endif  value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach

                    </select>
                </label>
                <label class="m-r-12 col-15 col-m-8"><input class="dates" type="text" name="dates"
                                                   value="{{(isset($data['dates']))?$data['dates']:''}}"
                                                   placeholder="Seleccione rango de fechas"></label>
                <div class=" Filters-submit col-15  col-m-2 row justify-center ">
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
    <form action="{{route('downloadExcel')}}" method="post" id="downloadExcel"></form>

@endsection
