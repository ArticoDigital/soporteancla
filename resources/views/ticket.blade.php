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

    @if (\Session::has('messageok'))
        <div class="alert-success">
            <ul>
                <li>{!! \Session::get('messageok') !!}</li>
            </ul>
        </div>
    @endif
    <div class="Ticket">
        <div class="row justify-between middle-items m-t-16 m-b-16">
            <div class="col-6"><h2 class="">Ticket #{{$ticket->id}}: {{$ticket->name}}</h2></div>
            <p class="m-t-a-20 col-16"><b>Solicitud: </b>{!! nl2br(e($ticket->request)) !!}</p>
        </div>

        <form class="row justify-between Ticket-info" enctype="multipart/form-data" method="post"
              action="{{route('updateTicket',[$ticket->id])}}">
            @csrf
            <div class="col-16 col-m-5">
                <p><b>Nombre: </b> {{$ticket->name}}</p>
                <p><b>Compañia: </b> {{$ticket->company}}</p>
                <p><b>Celular: </b> {{$ticket->cellphone}}</p>
            </div>
            <div class="col-16 col-m-5">
                <p><b>Email: </b> {{$ticket->email}}</p>
                <p><b>identification: </b> {{$ticket->identification}}</p>
                <p><b>Punto de venta: </b> {{$ticket->sell_point}}</p>

            </div>
            <div class="col-16 col-m-5">
                <p><b>Centro de operaciones: </b> {{$ticket->operation_center}}</p>
                <p><b>Subcategoría de servicio: </b> {{$ticket->ServiceSubcategory->name}}</p>
                <p><b>Ciudad: </b> {{$ticket->city->municipio}}
                    {{$ticket->city->municipio == 'Otro'? ' - ' . $ticket->city_text:''}}</p>
                @if($ticket->file2)
                    <p><b>Documento</b> <a target="_blank" href="{{Storage::url($ticket->file2)}}"> Ver documento</a></p>
                @endif
            </div>
            @hasrole('Admin')
            <h4 class="m-t-40">Actualizar ticket</h4>
            <div class="row col-16   middle-items">
                <div class="col-16 row  m-b-28 middle-items">
                    <label for="" class="col-15 col-l-8">
                        <input type="file" class="" name="file" placeholder="Archivo">
                    </label>
                    @if($ticket->file)
                        <div class="col-8 p-l-32"><a target="_blank" href="{{Storage::url($ticket->file)}}">Ver
                                archivo</a></div>
                    @endif
                </div>

                <div class="col-16 col-l-16 row justify-left">

                    <div class="row middle-items col-16 col-m-8 col-l-6">
                        <div class="col-4"><p><b>Asignado a: </b></p></div>
                        <select class="col-11" name="user_id" id="">
                            <option value="">Seleccione un opción</option>
                            @if(isset($ticket->user) && $ticket->user->isActive == 0)
                                <option
                                        selected value="{{$ticket->user->id}}">{{$ticket->user->name}} - inactivo
                                </option>
                            @endif

                            @foreach($users as $user)
                                <option
                                        {{($user->id == $ticket->user_id)?'selected':''}}
                                        value="{{$user->id}}">{{$user->name}}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="row middle-items @hasrole('Admin') col-16 col-l-5 @else col-16 col-l-8 @endhasrole ">
                        <div class="col-4"><p><b>Estado: </b></p></div>
                        <select class="col-11" name="ticket_state_id" id="ticket_state">
                            <option value="">Seleccione un opción</option>
                            @foreach($ticketStates as $ticketState)
                                <option
                                        {{($ticketState->id == $ticket->ticket_state_id)?'selected':''}}
                                        value="{{$ticketState->id}}">{{$ticketState->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div id="isfinished" class="boxcolor {{$ticket->ticket_state_id == 4?'':'is-hidden'}}">
                      <input name="is_invoiced" id="is_invoiced" type="checkbox" value="1" class="{{$ticket->ticket_state_id == 4?'':'is-hidden'}}" {{($ticket->is_invoiced == 1) ? 'checked': ''}} >
                      <label for="is_invoiced" class="m-t-16 m-b-20">Es facturado:</label>

                      <input id="invoice_cost" class="{{$ticket->is_invoiced == 1?'':'is-hidden'}}" type="text" name="invoice_cost"
                             placeholder="Valor" value="{{$ticket->invoice_cost}}">

                    </div>

                    <div class="row middle-items @hasrole('Admin')   col-16 col-l-5 @else col-16 col-l-8 @endhasrole ">

                      <div class="row middle-items   col-16">

                          <div class="col-4"><p><b>#SAP: </b></p></div>
                          <label for="" class="col-11"><input type="text" name="sap_number"
                                                              value="{{$ticket->sap_number}}"></label>
                      </div>
                    </div>

                </div>
                <div class="col-16  m-t-40">
                    <button type="submit">Actualizar</button>
                </div>

            </div>
            @endhasrole
        </form>
        <h4 class="m-t-40">Comentarios</h4>
        @forelse($ticket->comments as $comment)
            <div class="m-t-20 row middle-items">
                <div class="col-3">
                    {{$comment->user->name}}
                </div>
                <div class="col-13">
                    <p>{{$comment->comment_text}}</p>
                    <p class="row align-center m-t-4 Ticket-date">
                        <i class="far fa-clock"></i>
                        <span class="m-l-4">{{$comment->created_at}}</span>
                    </p>
                </div>
            </div>
            @if (!$loop->last)
                <hr>
            @endif

        @empty

            <div>
                No hay comentarios
            </div>
        @endforelse

        <form action="{{route('updateComment')}}" method="post" class="m-t-40">
            @csrf
            <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
            <textarea name="comment_text" id="" cols="30" rows="10" placeholder="Escribe un comentario"
                      required></textarea>
            <div class="m-t-20">
                <button type="submit">Comentar</button>
            </div>
        </form>
    </div>
@endsection
