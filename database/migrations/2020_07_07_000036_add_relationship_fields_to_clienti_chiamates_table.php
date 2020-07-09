<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToClientiChiamatesTable extends Migration
{
    public function up()
    {
        Schema::table('clienti_chiamates', function (Blueprint $table) {
            $table->unsignedInteger('filiale_id')->nullable();
            $table->foreign('filiale_id', 'filiale_fk_1636042')->references('id')->on('filialis');
            $table->unsignedInteger('agente_id');
            $table->foreign('agente_id', 'agente_fk_1636043')->references('id')->on('agent_profiles');
            $table->unsignedInteger('cliente_id')->nullable();
            $table->foreign('cliente_id', 'cliente_fk_1636044')->references('id')->on('agent_clients');
            $table->unsignedInteger('pratica_id')->nullable();
            $table->foreign('pratica_id', 'pratica_fk_1636045')->references('id')->on('praticas');
            $table->unsignedInteger('richiesta_id')->nullable();
            $table->foreign('richiesta_id', 'richiesta_fk_1636046')->references('id')->on('richiesta');
            $table->unsignedInteger('alert_id')->nullable();
            $table->foreign('alert_id', 'alert_fk_1636055')->references('id')->on('user_alerts');
        });
    }
}
