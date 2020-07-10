<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgentProfileAppuntamentiPivotTable extends Migration
{
    public function up()
    {
        Schema::create('agent_profile_appuntamenti', function (Blueprint $table) {
            $table->unsignedInteger('appuntamenti_id');
            $table->foreign('appuntamenti_id', 'appuntamenti_id_fk_1142343')->references('id')->on('appuntamentis')->onDelete('cascade');
            $table->unsignedInteger('agent_profile_id');
            $table->foreign('agent_profile_id', 'agent_profile_id_fk_1142343')->references('id')->on('agent_profiles')->onDelete('cascade');
        });
    }
}
