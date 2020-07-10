<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAgenziesTable extends Migration
{
    public function up()
    {
        Schema::table('agenzies', function (Blueprint $table) {
            $table->unsignedInteger('admin_id');
            $table->foreign('admin_id', 'admin_fk_1018677')->references('id')->on('agent_profiles');
        });
    }
}
