<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSecretaryProfilesTable extends Migration
{
    public function up()
    {
        Schema::table('secretary_profiles', function (Blueprint $table) {
            $table->unsignedInteger('comune_id')->nullable();
            $table->foreign('comune_id', 'comune_fk_1725475')->references('id')->on('comunis');
            $table->unsignedInteger('filiale_id')->nullable();
            $table->foreign('filiale_id', 'filiale_fk_1725476')->references('id')->on('filialis');
        });
    }
}
