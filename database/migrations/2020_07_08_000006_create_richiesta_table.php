<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRichiestaTable extends Migration
{
    public function up()
    {
        Schema::create('richiesta', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('prezzo', 15, 2);
            $table->string('priorita');
            $table->string('destinazione');
            $table->string('stato_ids')->nullable();
            $table->string('piano_ids')->nullable();
            $table->string('piano')->nullable();
            $table->string('uso')->nullable();
            $table->string('contesto')->nullable();
            $table->string('cucina')->nullable();
            $table->string('camere')->nullable();
            $table->string('servizi')->nullable();
            $table->string('mq')->nullable();
            $table->string('giardino')->nullable();
            $table->string('terrazza')->nullable();
            $table->string('stato');
            $table->timestamps();
        });
    }
}
