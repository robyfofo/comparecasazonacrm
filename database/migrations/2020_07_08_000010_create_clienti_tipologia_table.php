<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientiTipologiaTable extends Migration
{
    public function up()
    {
        Schema::create('clienti_tipologia', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tipologia');
            $table->boolean('stato')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
