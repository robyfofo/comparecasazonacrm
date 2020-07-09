<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('client_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ruolo')->nullable();
            $table->string('settore')->nullable();
            $table->string('indirizzo')->nullable();
            $table->string('civico')->nullable();
            $table->string('cap')->nullable();
            $table->string('azienda')->nullable();
            $table->string('piva')->nullable();
            $table->string('telefono')->nullable();
            $table->string('cellulare')->nullable();
            $table->string('fax')->nullable();
            $table->string('livello')->nullable();
            $table->longText('note')->nullable();
            $table->date('birthday')->nullable();
            $table->string('nazione')->nullable();
            $table->string('nome_2')->nullable();
            $table->string('cognome_2')->nullable();
            $table->string('affinita')->nullable();
            $table->string('email_2')->nullable();
            $table->string('indirizzo_2')->nullable();
            $table->string('civico_2')->nullable();
            $table->string('cap_2')->nullable();
            $table->string('telefono_2')->nullable();
            $table->string('cellulare_2')->nullable();
            $table->string('fax_2')->nullable();
            $table->integer('stato')->nullable();
            $table->string('email_istituzionale')->nullable();
            $table->timestamps();
        });
    }
}
