<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToImmobilesTable extends Migration
{
    public function up()
    {
        Schema::table('immobiles', function (Blueprint $table) {
            $table->unsignedInteger('cliente_id');
            $table->foreign('cliente_id', 'cliente_fk_1098183')->references('id')->on('agent_clients');
            $table->unsignedInteger('agente_id');
            $table->foreign('agente_id', 'agente_fk_1098184')->references('id')->on('agent_profiles');
            $table->unsignedInteger('filiale_id');
            $table->foreign('filiale_id', 'filiale_fk_1098185')->references('id')->on('filialis');
            $table->unsignedInteger('tipologia_immobile_id');
            $table->foreign('tipologia_immobile_id', 'tipologia_immobile_fk_1098186')->references('id')->on('tipologia_immobilis');
            $table->unsignedInteger('provincia_id');
            $table->foreign('provincia_id', 'provincia_fk_1098187')->references('id')->on('provinces');
            $table->unsignedInteger('comune_id');
            $table->foreign('comune_id', 'comune_fk_1098188')->references('id')->on('comunis');
            $table->unsignedInteger('garage_id')->nullable();
            $table->foreign('garage_id', 'garage_fk_1103954')->references('id')->on('garage_immobiles');
        });
    }
}
