@extends('layouts.layout')

@section('content')
    <div class="Ticket-success">
        <div class="row m-t-40">
            <div class="col-10 Ticket-successBorder">
                <h2>Se ha enviado la incidencia</h2>
                <hr>
                <p>
                    Nuestro equipo ha recibido su mensaje, le enviaremos a su dirección
                    email {{$ticket->email}} en cuanto sea posible :-) !Gracias por su paciencia!
                </p>
            </div>
            <div class="col-1"></div>
            <div class="col-5  Ticket-successBorder">
                <h4>Ticket Nº {{$ticket->id}}</h4>
            </div>
        </div>
        <div class="m-t-a-40">
            <a class="button" href="http://ancla.la">Volver al E-commerce</a>
        </div>
    </div>
@endsection
