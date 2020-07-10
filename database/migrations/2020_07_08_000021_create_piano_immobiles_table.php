<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePianoImmobilesTable extends Migration
{
    public function up()
    {
        Schema::create('piano_immobiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('piano');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
