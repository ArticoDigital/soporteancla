@component('mail::message')

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach


{{-- Body --}}
   
   @component('mail::table')
   | ID       | Cliente         | Enlace  |
   | ------------- |:-------------:| --------:|
   @foreach($data as $value)
  | {{$value->id}}  | {{$value->name}} | <a href="{{ route('ticket', $value->id)}}">Ver ticket</a> |
   @endforeach

   @endcomponent

   @component('mail::button', ['url' => 'http://soporte.ancla.la/'])
    Ir a plataforma
   @endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
