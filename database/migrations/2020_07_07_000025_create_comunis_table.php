<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComunisTable extends Migration
{
    public function up()
    {
        Schema::create('comunis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome')->nullable();
            $table->string('cap')->nullable();
            $table->string('prefisso')->nullable();
            $table->string('provincia')->nullable();
            $table->boolean('stato')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
