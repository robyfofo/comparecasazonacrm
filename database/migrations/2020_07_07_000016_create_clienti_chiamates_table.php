<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientiChiamatesTable extends Migration
{
    public function up()
    {
        Schema::create('clienti_chiamates', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('data_ora');
            $table->longText('testo');
            $table->integer('stato')->nullable();
            $table->string('direzione');
            $table->string('nome')->nullable();
            $table->string('cognome')->nullable();
            $table->string('telefono')->nullable();
            $table->string('cellulare')->nullable();
            $table->string('email')->nullable();
            $table->date('data_risposta')->nullable();
            $table->timestamps();
        });
    }
}
