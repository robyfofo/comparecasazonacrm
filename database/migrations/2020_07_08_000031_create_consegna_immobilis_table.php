<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsegnaImmobilisTable extends Migration
{
    public function up()
    {
        Schema::create('consegna_immobilis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('consegna')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
