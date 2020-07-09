<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppuntamentisTable extends Migration
{
    public function up()
    {
        Schema::create('appuntamentis', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('data_ora');
            $table->string('luogo');
            $table->longText('note')->nullable();
            $table->integer('durata');
            $table->timestamps();
        });
    }
}
