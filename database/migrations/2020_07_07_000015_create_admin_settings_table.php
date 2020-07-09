<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('admin_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('alert_pratica_scadenza_incarico')->nullable();
            $table->string('alert_pratica_scadenza_incarico_on');
            $table->integer('alert_appuntamento')->nullable();
            $table->string('alert_appuntamento_on')->nullable();
            $table->integer('alert_pratica_scadenza_affitto')->nullable();
            $table->string('alert_pratica_scadenza_affitto_on')->nullable();
            $table->integer('obiettivo_venduto')->nullable();
            $table->decimal('obiettivo_profitto', 15, 2)->nullable();
            $table->string('alert_richiamata_cliente_on')->nullable();
            $table->integer('alert_richiamata_cliente')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
