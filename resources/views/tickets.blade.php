@extends('layouts.layout')

@section('content')
    <div class="row justify-between middle-items m-t-16 m-b-16">
        <div class="col-6"><h2 class="">Tickets</h2></div>
        <form class="Filters row col-10 middle-items justify-end">
            <label class="col-4 m-r-12" for="">
                <select class="col m-r-12" name="" id="">
                    <option value="">Selecione un estado</option>
                    @foreach($states as $state)
                        <option value="{{$state->id}}">{{$state->name}}</option>
                    @endforeach
                </select>
            </label>
            <label class="m-r-12 col-8 "><input class="dates" type="text"
                                                placeholder="Seleccione rango de fechas"></label>
            <div class=" Filters-submit col-2 row justify-center ">
                <button class="Filters-button" type="submit"><i class="fas fa-sliders-h"></i></button>
            </div>
        </form>
    </div>
    <ul class="is-list-less  Items">
        @foreach($tickets as $ticket)
            <li class="Items-wrapper row middle-items">
                <div class="col-1 row justify-center">
                    <div class=" Status-indicator active"></div>
                </div>
                <div class="col-2 is-text-center">{{$ticket->name}}</div>
                <div class="col-3 is-text-center">{{$ticket->subject}}</div>
                <div class="col-4 is-text-center">{{$ticket->ServiceCategory->name}}</div>
                <div class="col-3 is-text-center">{{$ticket->email}}</div>
                <div class="col-2 is-text-center">{{optional($ticket->user)->name}}</div>
                <div class="col-1 row justify-end middle-items">
                    <a href="{{route('ticket',[$ticket->id])}}"><i class="fas fa-edit "></i></a>
                </div>
            </li>
        @endforeach
    </ul>
@endsection
