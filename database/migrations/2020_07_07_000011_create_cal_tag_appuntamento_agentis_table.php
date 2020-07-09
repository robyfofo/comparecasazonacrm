<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalTagAppuntamentoAgentisTable extends Migration
{
    public function up()
    {
        Schema::create('cal_tag_appuntamento_agentis', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('label');
            $table->datetime('data_ora');
            $table->timestamps();
        });
    }
}
