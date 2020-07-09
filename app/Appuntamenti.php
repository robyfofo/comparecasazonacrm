<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Appuntamenti extends Model
{
    public $table = 'appuntamentis';

    protected $dates = [
        'data_ora',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tipologia_id',
        'statoapp_id',
        'filiale_id',
        'data_ora',
        'luogo',
        'pratica_id',
        'richiesta_id',
        'cliente_id',
        'note',
        'durata',
        'alert_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function tipologia()
    {
        return $this->belongsTo(AppuntamentoTipologie::class, 'tipologia_id');
    }

    public function statoapp()
    {
        return $this->belongsTo(AppuntamentoStati::class, 'statoapp_id');
    }

    public function filiale()
    {
        return $this->belongsTo(Filiali::class, 'filiale_id');
    }

    public function getDataOraAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDataOraAttribute($value)
    {
        $this->attributes['data_ora'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function pratica()
    {
        return $this->belongsTo(Pratica::class, 'pratica_id');
    }

    public function richiesta()
    {
        return $this->belongsTo(Richiestum::class, 'richiesta_id');
    }

    public function cliente()
    {
        return $this->belongsTo(AgentClient::class, 'cliente_id');
    }

    public function agentes()
    {
        return $this->belongsToMany(AgentProfile::class);
    }

    public function alert()
    {
        return $this->belongsTo(UserAlert::class, 'alert_id');
    }
}
