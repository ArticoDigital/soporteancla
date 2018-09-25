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
            $table->string('sapnumber')->nullable();
            $table->string('identification');
            $table->string('sell_point');
            $table->string('operation_center');
            $table->string('identification');
            $table->string('user_id')->unsigned(); //Usuario al que se le asigna el ticket
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('service_category_id')->unsigned();
            $table->foreign('service_category_id')->references('id')->on('service_categories');
            $table->string('ticket_state_id')->unsigned();
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
