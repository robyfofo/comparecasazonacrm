<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppuntamentoTipologiesTable extends Migration
{
    public function up()
    {
        Schema::create('appuntamento_tipologies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->integer('pos');
            $table->string('bgcolor')->nullable();
            $table->timestamps();
        });
    }
}
