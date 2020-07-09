<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToComunisTable extends Migration
{
    public function up()
    {
        Schema::table('comunis', function (Blueprint $table) {
            $table->unsignedInteger('prov_id')->nullable();
            $table->foreign('prov_id', 'prov_fk_1004968')->references('id')->on('provinces');
        });
    }
}
