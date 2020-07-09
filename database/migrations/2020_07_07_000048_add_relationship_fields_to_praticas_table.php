<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPraticasTable extends Migration
{
    public function up()
    {
        Schema::table('praticas', function (Blueprint $table) {
            $table->unsignedInteger('cliente_id');
            $table->foreign('cliente_id', 'cliente_fk_1068779')->references('id')->on('agent_clients');
            $table->unsignedInteger('agente_id');
            $table->foreign('agente_id', 'agente_fk_1068780')->references('id')->on('agent_profiles');
            $table->unsignedInteger('filiale_id');
            $table->foreign('filiale_id', 'filiale_fk_1068781')->references('id')->on('filialis');
            $table->unsignedInteger('tipologia_immobile_id');
            $table->foreign('tipologia_immobile_id', 'tipologia_immobile_fk_1073816')->references('id')->on('tipologia_immobilis');
            $table->unsignedInteger('immobile_id');
            $table->foreign('immobile_id', 'immobile_fk_1101900')->references('id')->on('immobiles');
            $table->unsignedInteger('contratto_id');
            $table->foreign('contratto_id', 'contratto_fk_1223597')->references('id')->on('contratto_immobiles');
            $table->unsignedInteger('consegna_id')->nullable();
            $table->foreign('consegna_id', 'consegna_fk_1223602')->references('id')->on('consegna_immobilis');
            $table->unsignedInteger('contratto_tipo_id')->nullable();
            $table->foreign('contratto_tipo_id', 'contratto_tipo_fk_1225671')->references('id')->on('tipologia_contratto_prezzos');
            $table->unsignedInteger('tipo_mandato_id')->nullable();
            $table->foreign('tipo_mandato_id', 'tipo_mandato_fk_1225673')->references('id')->on('tipologia_mandato_praticas');
            $table->unsignedInteger('mandato_agente_id')->nullable();
            $table->foreign('mandato_agente_id', 'mandato_agente_fk_1225880')->references('id')->on('agent_profiles');
            $table->unsignedInteger('scadenza_incarico_alert_id')->nullable();
            $table->foreign('scadenza_incarico_alert_id', 'scadenza_incarico_alert_fk_1547316')->references('id')->on('user_alerts');
            $table->unsignedInteger('scadenza_affitto_alert_id')->nullable();
            $table->foreign('scadenza_affitto_alert_id', 'scadenza_affitto_alert_fk_1559281')->references('id')->on('user_alerts');
        });
    }
}
