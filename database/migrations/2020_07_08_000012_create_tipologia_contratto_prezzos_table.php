<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipologiaContrattoPrezzosTable extends Migration
{
    public function up()
    {
        Schema::create('tipologia_contratto_prezzos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->nullable();
            $table->timestamps();
        });
    }
}
