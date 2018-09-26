@extends('layouts.layout')

@section('content')
    <div class="Ticket">
        <div class="row justify-between middle-items m-t-16 m-b-16">
            <div class="col-6"><h2 class="">Ticket #129 : Daño caja fuerte</h2></div>
            <p class="m-t-a-20"><b>Solicitud: </b>Lorem ipsum dolor amet palo santo before they sold out coloring book
                raw
                denim, humblebrag
                irony messenger bag PBR&B freegan heirloom yuccie taxidermy drinking vinegar. Tousled put a bird on it
                gentrify migas. Kogi typewriter butcher kombucha brunch, church-key hammock. Put a bird on it cardigan
                enamel pin lo-fi next level PBR&B meditation. Live-edge meh occupy before they sold out, lumbersexual
                artisan coloring book disrupt hell of kogi hoodie unicorn DIY etsy plaid
            </p>
        </div>
        <form class="row justify-between Ticket-info">
            <div class="col-5">
                <p><b>Nombre: </b> Juan Ramos</p>
                <p><b>Compañia: </b> Ártico Digital</p>
                <p><b>Celular: </b> 300 554 93 72</p>
            </div>
            <div class="col-5">
                <p><b>Email: </b> juan2ramos@gmail.com</p>
                <p><b>identification: </b> 9123912312-1</p>
                <p><b>Punto de venta: </b> 9123912312-1</p>

            </div>
            <div class="col-5">
                <p><b>Centro de operaciones: </b> 300</p>
                <p><b>Categoría de servicio: </b> Cajas fuertes</p>
            </div>
            <h4 class="m-t-40">Comentarios</h4>
            <div class="row col-16   middle-items">
                <div class="col-13 row justify-between">
                    <div class="row middle-items col-8">
                        <div class="col-3"><p><b>Asignado a: </b></p></div>
                        <select class="col-11" name="" id="">
                            <option value="">Seleccione un opción</option>
                        </select>
                    </div>
                    <div class="row middle-items col-8">
                        <div class="col-3"><p><b>#SAP: </b></p></div>
                        <label for="" class="col-11"><input type="text"></label>
                    </div>
                </div>
                <div class="col-3">
                    <button type="submit">Actualizar</button>
                </div>
            </div>
        </form>
        <h4 class="m-t-40">Comentarios</h4>
        <div class="m-t-20 row middle-items">
            <div class="col-3">
                Juan Ramos
            </div>
            <div class="col-13">
                <p>Ya estoy verificando con nuestro equipo del segundo nivel de soporte por que las campañas \"Más que
                    seguridad te damos tranquilidad\" no han sido enviadas. Te aviso en cuanto encontremos la razón y
                    podamos comprobar que se ha realizado el envío.
                </p>
                <p class="row align-center m-t-4 Ticket-date">
                    <i class="far fa-clock"></i><span class="m-l-4">martes 03 jul. 2018 at 14:13</span>
                </p>
            </div>
        </div>
        <hr>
        <form action="" class="m-t-40">
            <textarea name="" id="" cols="30" rows="10" placeholder="Escribe un comentario"></textarea>
            <div class="m-t-20">
                <button type="submit">Comentar</button>
            </div>
        </form>
    </div>
@endsection
