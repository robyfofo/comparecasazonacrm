<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('agent_profile_id')->nullable();
            $table->foreign('agent_profile_id', 'agent_profile_fk_981722')->references('id')->on('agent_profiles');
            $table->unsignedInteger('client_profile_id')->nullable();
            $table->foreign('client_profile_id', 'client_profile_fk_1065666')->references('id')->on('agent_clients');
            $table->unsignedInteger('secretary_profile_id')->nullable();
            $table->foreign('secretary_profile_id', 'secretary_profile_fk_1725481')->references('id')->on('secretary_profiles');
        });
    }
}
