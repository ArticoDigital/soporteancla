<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('company');
            $table->string('cellphone');
            $table->string('email');
            $table->string('subject');
            $table->string('address')->nullable();
            $table->string('sap_number')->nullable();
            $table->string('identification');
            $table->string('sell_point')->nullable();
            $table->string('file')->nullable();  //archivo subido por el soporte o el admin al ticket
            $table->string('file2')->nullable(); //archivo1 subido por el cliente en el ticket
            $table->string('file3')->nullable(); //archivo2 subido por el cliente en el ticket
            $table->string('operation_center')->nullable();
            $table->integer('user_id')->nullable(); //Usuario al que se le asigna el ticket
            $table->integer('service_subcategory_id')->unsigned();
            $table->foreign('service_subcategory_id')->references('id')->on('service_subcategories');
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->string('city_text')->nullable();  //Si selecciona otro city_id código_otro:100000, debe agregar el texto de la ciudad o municipio.
            $table->integer('ticket_state_id')->unsigned();
            $table->foreign('ticket_state_id')->references('id')->on('ticket_states');
            $table->longText('request');
            $table->boolean('is_invoiced')->nullable();  //aplica costo 1si 0no
            $table->integer('invoice_cost')->nullable(); //costo del soporte
            $table->string('invoice_number')->nullable(); //costo del soporte
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
