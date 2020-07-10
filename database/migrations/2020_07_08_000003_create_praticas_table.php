<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePraticasTable extends Migration
{
    public function up()
    {
        Schema::create('praticas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pratica');
            $table->string('tipologia');
            $table->string('stato');
            $table->decimal('prezzo', 15, 2)->nullable();
            $table->decimal('prezzo_richiesto', 15, 2)->nullable();
            $table->longText('prezzo_note')->nullable();
            $table->string('spese_condominio')->nullable();
            $table->string('data_consegna')->nullable();
            $table->longText('notaio_tasse')->nullable();
            $table->longText('spese_accessori')->nullable();
            $table->longText('note')->nullable();
            $table->string('prezzo_nascondi')->nullable();
            $table->date('mandato_inizio')->nullable();
            $table->date('mandato_fine')->nullable();
            $table->date('mandato_rinnovo')->nullable();
            $table->string('in_home')->nullable();
            $table->string('sul_sito')->nullable();
            $table->string('nascondi_foto')->nullable();
            $table->string('newsletter')->nullable();
            $table->date('inizio_affitto')->nullable();
            $table->date('scadenza_affitto')->nullable();
            $table->string('venduto')->nullable();
            $table->decimal('profitto', 15, 2)->nullable();
            $table->decimal('profitto_iva', 15, 2)->nullable();
            $table->date('data_vendita')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
