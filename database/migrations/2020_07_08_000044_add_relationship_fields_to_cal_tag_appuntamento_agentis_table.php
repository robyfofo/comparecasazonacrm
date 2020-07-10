<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCalTagAppuntamentoAgentisTable extends Migration
{
    public function up()
    {
        Schema::table('cal_tag_appuntamento_agentis', function (Blueprint $table) {
            $table->unsignedInteger('appuntamento_id');
            $table->foreign('appuntamento_id', 'appuntamento_fk_1142892')->references('id')->on('appuntamentis');
            $table->unsignedInteger('agente_id');
            $table->foreign('agente_id', 'agente_fk_1142893')->references('id')->on('agent_profiles');
        });
    }
}
