<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('agent_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('indirizzo')->nullable();
            $table->integer('cap')->nullable();
            $table->string('telefono')->nullable();
            $table->string('cellulare')->nullable();
            $table->string('fax')->nullable();
            $table->time('lunedi_inizio')->nullable();
            $table->time('lunedi_fine')->nullable();
            $table->time('martedi_inizio')->nullable();
            $table->time('martedi_fine')->nullable();
            $table->time('mercoledi_inizio')->nullable();
            $table->time('mercoledi_fine')->nullable();
            $table->time('giovedi_inizio')->nullable();
            $table->time('giovedi_fine')->nullable();
            $table->time('venerdi_inizio')->nullable();
            $table->time('venerdi_fine')->nullable();
            $table->time('sabato_inizio')->nullable();
            $table->time('sabato_fine')->nullable();
            $table->time('domenica_inizio')->nullable();
            $table->time('domenica_fine')->nullable();
            $table->string('email_istituzionale')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
