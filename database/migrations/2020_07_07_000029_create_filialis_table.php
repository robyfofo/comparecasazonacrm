<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilialisTable extends Migration
{
    public function up()
    {
        Schema::create('filialis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->string('indirizzo')->nullable();
            $table->integer('cap')->nullable();
            $table->string('email')->nullable();
            $table->string('telefono')->nullable();
            $table->string('fax')->nullable();
            $table->string('email_pec')->nullable();
            $table->string('cellulare')->nullable();
            $table->string('web')->nullable();
            $table->string('codice_fiscale')->nullable();
            $table->string('partita_iva')->nullable();
            $table->string('ccia_numero_rea')->nullable();
            $table->decimal('capitale_sociale', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
