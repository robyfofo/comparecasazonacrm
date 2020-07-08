<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserAlert extends Model
{
    public $table = 'user_alerts';

    protected $dates = [
        'scadenza_evento',
        'created_at',
        'updated_at',
    ];

    const TIPO_RADIO = [
        '1' => 'appuntamento',
        '2' => 'incarico_pratica',
    ];

    protected $fillable = [
        'alert_text',
        'alert_link',
        'tipo',
        'scadenza_evento',
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function getScadenzaEventoAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setScadenzaEventoAttribute($value)
    {
        $this->attributes['scadenza_evento'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }
}
