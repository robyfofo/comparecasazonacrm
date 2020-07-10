<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFatturasTable extends Migration
{
    public function up()
    {
        Schema::create('fatturas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cliente_nome');
            $table->string('cliente_cognome')->nullable();
            $table->string('cliente_ragione_sociale')->nullable();
            $table->string('cliente_codice_fiscale')->nullable();
            $table->string('cliente_partita_iva')->nullable();
            $table->string('cliente_indirizzo');
            $table->string('filiale_agenzia_nome')->nullable();
            $table->string('fattura_numero');
            $table->integer('fattura_anno');
            $table->date('data_emissione');
            $table->timestamps();
        });
    }
}
