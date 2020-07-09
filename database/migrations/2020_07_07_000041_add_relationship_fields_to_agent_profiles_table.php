<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAgentProfilesTable extends Migration
{
    public function up()
    {
        Schema::table('agent_profiles', function (Blueprint $table) {
            $table->unsignedInteger('comune_id')->nullable();
            $table->foreign('comune_id', 'comune_fk_1015063')->references('id')->on('comunis');
            $table->unsignedInteger('filiale_id')->nullable();
            $table->foreign('filiale_id', 'filiale_fk_1021104')->references('id')->on('filialis');
        });
    }
}
