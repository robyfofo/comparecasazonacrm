<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipologiaImmobilisTable extends Migration
{
    public function up()
    {
        Schema::create('tipologia_immobilis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('insieme')->nullable();
            $table->string('nome');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
