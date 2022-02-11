<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateReservationDate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservation_date', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('desk_id')->unsigned();
            $table->foreign('desk_id')->references('id')->on('desks');
            $table->dateTime('datum_rezervacije');
            $table->string('ime_gosta');
            $table->boolean('rezervisan');
            $table->boolean('korisnik');
            $table->string('broj_telefon')->nullable();
            $table->string('email')->nullable();
            $table->integer('broj_gostiju')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation_date');
    }
}
