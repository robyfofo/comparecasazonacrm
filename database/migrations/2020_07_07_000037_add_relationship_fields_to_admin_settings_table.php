<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAdminSettingsTable extends Migration
{
    public function up()
    {
        Schema::table('admin_settings', function (Blueprint $table) {
            $table->unsignedInteger('agenzia_id');
            $table->foreign('agenzia_id', 'agenzia_fk_1497032')->references('id')->on('agenzies');
            $table->unsignedInteger('filiale_id')->nullable();
            $table->foreign('filiale_id', 'filiale_fk_1497033')->references('id')->on('filialis');
        });
    }
}
