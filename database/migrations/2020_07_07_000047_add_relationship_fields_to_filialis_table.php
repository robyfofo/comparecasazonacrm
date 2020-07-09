<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFilialisTable extends Migration
{
    public function up()
    {
        Schema::table('filialis', function (Blueprint $table) {
            $table->unsignedInteger('agenzia_id');
            $table->foreign('agenzia_id', 'agenzia_fk_1021022')->references('id')->on('agenzies');
            $table->unsignedInteger('comune_id');
            $table->foreign('comune_id', 'comune_fk_1021028')->references('id')->on('comunis');
        });
    }
}
