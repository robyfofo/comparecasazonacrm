<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdminSetting extends Model
{
    use SoftDeletes;

    public $table = 'admin_settings';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const ALERT_APPUNTAMENTO_ON_RADIO = [
        '1' => 'ON',
        '0' => 'OFF',
    ];

    const ALERT_RICHIAMATA_CLIENTE_ON_RADIO = [
        '1' => 'ON',
        '0' => 'OFF',
    ];

    const ALERT_PRATICA_SCADENZA_AFFITTO_ON_RADIO = [
        '1' => 'ON',
        '0' => 'OFF',
    ];

    const ALERT_PRATICA_SCADENZA_INCARICO_ON_RADIO = [
        '1' => 'ON',
        '0' => 'OFF',
    ];

    protected $fillable = [
        'alert_pratica_scadenza_incarico',
        'alert_pratica_scadenza_incarico_on',
        'alert_appuntamento',
        'alert_appuntamento_on',
        'agenzia_id',
        'filiale_id',
        'alert_pratica_scadenza_affitto',
        'alert_pratica_scadenza_affitto_on',
        'obiettivo_venduto',
        'obiettivo_profitto',
        'alert_richiamata_cliente_on',
        'alert_richiamata_cliente',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function agenzia()
    {
        return $this->belongsTo(Agenzie::class, 'agenzia_id');
    }

    public function filiale()
    {
        return $this->belongsTo(Filiali::class, 'filiale_id');
    }
}
