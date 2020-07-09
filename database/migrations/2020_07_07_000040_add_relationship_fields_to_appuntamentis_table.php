<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAppuntamentisTable extends Migration
{
    public function up()
    {
        Schema::table('appuntamentis', function (Blueprint $table) {
            $table->unsignedInteger('tipologia_id');
            $table->foreign('tipologia_id', 'tipologia_fk_1142267')->references('id')->on('appuntamento_tipologies');
            $table->unsignedInteger('statoapp_id');
            $table->foreign('statoapp_id', 'statoapp_fk_1142268')->references('id')->on('appuntamento_statis');
            $table->unsignedInteger('filiale_id');
            $table->foreign('filiale_id', 'filiale_fk_1142269')->references('id')->on('filialis');
            $table->unsignedInteger('pratica_id');
            $table->foreign('pratica_id', 'pratica_fk_1142340')->references('id')->on('praticas');
            $table->unsignedInteger('richiesta_id')->nullable();
            $table->foreign('richiesta_id', 'richiesta_fk_1142341')->references('id')->on('richiesta');
            $table->unsignedInteger('cliente_id');
            $table->foreign('cliente_id', 'cliente_fk_1142342')->references('id')->on('agent_clients');
            $table->unsignedInteger('alert_id')->nullable();
            $table->foreign('alert_id', 'alert_fk_1517536')->references('id')->on('user_alerts');
        });
    }
}
