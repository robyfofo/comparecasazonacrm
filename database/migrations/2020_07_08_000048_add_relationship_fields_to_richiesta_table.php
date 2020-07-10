<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToRichiestaTable extends Migration
{
    public function up()
    {
        Schema::table('richiesta', function (Blueprint $table) {
            $table->unsignedInteger('agente_id');
            $table->foreign('agente_id', 'agente_fk_1085002')->references('id')->on('agent_profiles');
            $table->unsignedInteger('agenzia_id');
            $table->foreign('agenzia_id', 'agenzia_fk_1085003')->references('id')->on('agenzies');
            $table->unsignedInteger('cliente_id')->nullable();
            $table->foreign('cliente_id', 'cliente_fk_1085004')->references('id')->on('agent_clients');
            $table->unsignedInteger('contratto_id');
            $table->foreign('contratto_id', 'contratto_fk_1085005')->references('id')->on('contratto_immobiles');
            $table->unsignedInteger('provincia_id')->nullable();
            $table->foreign('provincia_id', 'provincia_fk_1085006')->references('id')->on('provinces');
            $table->unsignedInteger('comune_id')->nullable();
            $table->foreign('comune_id', 'comune_fk_1085007')->references('id')->on('comunis');
            $table->unsignedInteger('garage_id')->nullable();
            $table->foreign('garage_id', 'garage_fk_1103982')->references('id')->on('garage_immobiles');
            $table->unsignedInteger('tipologia_immobile_id')->nullable();
            $table->foreign('tipologia_immobile_id', 'tipologia_immobile_fk_1104646')->references('id')->on('tipologia_immobilis');
            $table->unsignedInteger('tipologia_immobile_2_id')->nullable();
            $table->foreign('tipologia_immobile_2_id', 'tipologia_immobile_2_fk_1134841')->references('id')->on('tipologia_immobilis');
            $table->unsignedInteger('tipologia_immobile_3_id')->nullable();
            $table->foreign('tipologia_immobile_3_id', 'tipologia_immobile_3_fk_1134842')->references('id')->on('tipologia_immobilis');
            $table->unsignedInteger('tipologia_immobile_4_id')->nullable();
            $table->foreign('tipologia_immobile_4_id', 'tipologia_immobile_4_fk_1134843')->references('id')->on('tipologia_immobilis');
            $table->unsignedInteger('comune_2_id')->nullable();
            $table->foreign('comune_2_id', 'comune_2_fk_1163280')->references('id')->on('comunis');
            $table->unsignedInteger('comune_3_id')->nullable();
            $table->foreign('comune_3_id', 'comune_3_fk_1163281')->references('id')->on('comunis');
            $table->unsignedInteger('comune_4_id')->nullable();
            $table->foreign('comune_4_id', 'comune_4_fk_1163282')->references('id')->on('comunis');
            $table->unsignedInteger('comune_5_id')->nullable();
            $table->foreign('comune_5_id', 'comune_5_fk_1163283')->references('id')->on('comunis');
            $table->unsignedInteger('comune_6_id')->nullable();
            $table->foreign('comune_6_id', 'comune_6_fk_1163284')->references('id')->on('comunis');
        });
    }
}
