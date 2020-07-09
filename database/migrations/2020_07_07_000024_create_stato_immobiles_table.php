<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatoImmobilesTable extends Migration
{
    public function up()
    {
        Schema::create('stato_immobiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('stato');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
