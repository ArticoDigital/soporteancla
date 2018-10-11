@extends('layouts.layout')

@section('content')
    <div class="Ticket-success">
        <div class="row m-t-40">
            <div class="col-10 Ticket-successBorder">
                <h2>Se ha enviado la incidencia</h2>
                <hr>
                <p>
                    Gracias por contactarnos. Hemos recibido su solicitud y en un plazo de 24 horas hábiles daremos
                    respuesta a su requerimiento.
                    Tenga presente que los horarios de atención son de Lunes a Viernes de 8am a 6pm y los Sábados de 9am
                    a 12m"
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
