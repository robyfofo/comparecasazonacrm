<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGarageImmobilesTable extends Migration
{
    public function up()
    {
        Schema::create('garage_immobiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('garage');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
