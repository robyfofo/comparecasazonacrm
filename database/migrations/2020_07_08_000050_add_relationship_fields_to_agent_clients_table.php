<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAgentClientsTable extends Migration
{
    public function up()
    {
        Schema::table('agent_clients', function (Blueprint $table) {
            $table->unsignedInteger('agente_id');
            $table->foreign('agente_id', 'agente_fk_1063963')->references('id')->on('agent_profiles');
            $table->unsignedInteger('filiale_id');
            $table->foreign('filiale_id', 'filiale_fk_1063964')->references('id')->on('filialis');
            $table->unsignedInteger('tipo_id')->nullable();
            $table->foreign('tipo_id', 'tipo_fk_1063965')->references('id')->on('clienti_tipologia');
            $table->unsignedInteger('comune_id')->nullable();
            $table->foreign('comune_id', 'comune_fk_1063971')->references('id')->on('comunis');
            $table->unsignedInteger('provincia_id')->nullable();
            $table->foreign('provincia_id', 'provincia_fk_1063972')->references('id')->on('provinces');
            $table->unsignedInteger('comune_2_id')->nullable();
            $table->foreign('comune_2_id', 'comune_2_fk_1063986')->references('id')->on('comunis');
            $table->unsignedInteger('prov_2_id')->nullable();
            $table->foreign('prov_2_id', 'prov_2_fk_1063987')->references('id')->on('provinces');
        });
    }
}
