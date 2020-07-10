<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContrattoImmobilesTable extends Migration
{
    public function up()
    {
        Schema::create('contratto_immobiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('contratto');
            $table->timestamps();
        });
    }
}
