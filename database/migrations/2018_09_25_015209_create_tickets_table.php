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
            $table->string('operation_center')->nullable();
            $table->integer('user_id')->nullable(); //Usuario al que se le asigna el ticket
            $table->integer('service_subcategory_id')->unsigned();
            $table->foreign('service_subcategory_id')->references('id')->on('service_subcategories');
            $table->integer('city_id')->unsigned();
            $table->foreign('city_id')->references('id')->on('cities');
            $table->integer('ticket_state_id')->unsigned();
            $table->foreign('ticket_state_id')->references('id')->on('ticket_states');
            $table->longText('request');
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
