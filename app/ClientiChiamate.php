<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class ClientiChiamate extends Model implements HasMedia
{
    use HasMediaTrait;

    public $table = 'clienti_chiamates';

    const DIREZIONE_SELECT = [
        'ricevuta'   => 'Ricevuta',
        'effettuate' => 'Effettuata',
    ];

    protected $dates = [
        'data_ora',
        'data_risposta',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'data_ora',
        'filiale_id',
        'agente_id',
        'cliente_id',
        'pratica_id',
        'richiesta_id',
        'testo',
        'stato',
        'direzione',
        'nome',
        'cognome',
        'telefono',
        'cellulare',
        'email',
        'alert_id',
        'data_risposta',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function getDataOraAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setDataOraAttribute($value)
    {
        $this->attributes['data_ora'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function filiale()
    {
        return $this->belongsTo(Filiali::class, 'filiale_id');
    }

    public function agente()
    {
        return $this->belongsTo(AgentProfile::class, 'agente_id');
    }

    public function cliente()
    {
        return $this->belongsTo(AgentClient::class, 'cliente_id');
    }

    public function pratica()
    {
        return $this->belongsTo(Pratica::class, 'pratica_id');
    }

    public function richiesta()
    {
        return $this->belongsTo(Richiestum::class, 'richiesta_id');
    }

    public function alert()
    {
        return $this->belongsTo(UserAlert::class, 'alert_id');
    }

    public function getDataRispostaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataRispostaAttribute($value)
    {
        $this->attributes['data_risposta'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
