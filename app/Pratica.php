<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Pratica extends Model implements HasMedia
{
    use SoftDeletes, HasMediaTrait;

    public $table = 'praticas';

    protected $appends = [
        'documenti',
    ];

    const STATO_SELECT = [
        '1' => 'No',
        '0' => 'Si',
    ];

    const IN_HOME_SELECT = [
        '1' => 'Si',
        '0' => 'No',
    ];

    const VENDUTO_SELECT = [
        '1' => 'Si',
        '0' => 'No',
    ];

    const SUL_SITO_SELECT = [
        '1' => 'Si',
        '0' => 'No',
    ];

    const NEWSLETTER_SELECT = [
        '0' => 'No',
        '1' => 'Si',
    ];

    const NASCONDI_FOTO_SELECT = [
        '1' => 'Si',
        '0' => 'No',
    ];

    const PREZZO_NASCONDI_SELECT = [
        '1' => 'Si',
        '0' => 'No',
    ];

    const TIPOLOGIA_SELECT = [
        '1' => 'Residenziale',
        '2' => 'Commerciale',
    ];

    protected $dates = [
        'mandato_inizio',
        'mandato_fine',
        'mandato_rinnovo',
        'inizio_affitto',
        'scadenza_affitto',
        'data_vendita',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'pratica',
        'tipologia',
        'cliente_id',
        'agente_id',
        'filiale_id',
        'tipologia_immobile_id',
        'immobile_id',
        'stato',
        'contratto_id',
        'prezzo',
        'prezzo_richiesto',
        'prezzo_note',
        'spese_condominio',
        'consegna_id',
        'data_consegna',
        'notaio_tasse',
        'spese_accessori',
        'note',
        'contratto_tipo_id',
        'prezzo_nascondi',
        'tipo_mandato_id',
        'mandato_agente_id',
        'mandato_inizio',
        'mandato_fine',
        'mandato_rinnovo',
        'in_home',
        'sul_sito',
        'nascondi_foto',
        'newsletter',
        'scadenza_incarico_alert_id',
        'inizio_affitto',
        'scadenza_affitto',
        'scadenza_affitto_alert_id',
        'venduto',
        'profitto',
        'profitto_iva',
        'data_vendita',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function cliente()
    {
        return $this->belongsTo(AgentClient::class, 'cliente_id');
    }

    public function agente()
    {
        return $this->belongsTo(AgentProfile::class, 'agente_id');
    }

    public function filiale()
    {
        return $this->belongsTo(Filiali::class, 'filiale_id');
    }

    public function tipologia_immobile()
    {
        return $this->belongsTo(TipologiaImmobili::class, 'tipologia_immobile_id');
    }

    public function immobile()
    {
        return $this->belongsTo(Immobile::class, 'immobile_id');
    }

    public function contratto()
    {
        return $this->belongsTo(ContrattoImmobile::class, 'contratto_id');
    }

    public function consegna()
    {
        return $this->belongsTo(ConsegnaImmobili::class, 'consegna_id');
    }

    public function contratto_tipo()
    {
        return $this->belongsTo(TipologiaContrattoPrezzo::class, 'contratto_tipo_id');
    }

    public function tipo_mandato()
    {
        return $this->belongsTo(TipologiaMandatoPratica::class, 'tipo_mandato_id');
    }

    public function mandato_agente()
    {
        return $this->belongsTo(AgentProfile::class, 'mandato_agente_id');
    }

    public function getMandatoInizioAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setMandatoInizioAttribute($value)
    {
        $this->attributes['mandato_inizio'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getMandatoFineAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setMandatoFineAttribute($value)
    {
        $this->attributes['mandato_fine'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getMandatoRinnovoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setMandatoRinnovoAttribute($value)
    {
        $this->attributes['mandato_rinnovo'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDocumentiAttribute()
    {
        return $this->getMedia('documenti');
    }

    public function scadenza_incarico_alert()
    {
        return $this->belongsTo(UserAlert::class, 'scadenza_incarico_alert_id');
    }

    public function getInizioAffittoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setInizioAffittoAttribute($value)
    {
        $this->attributes['inizio_affitto'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getScadenzaAffittoAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setScadenzaAffittoAttribute($value)
    {
        $this->attributes['scadenza_affitto'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function scadenza_affitto_alert()
    {
        return $this->belongsTo(UserAlert::class, 'scadenza_affitto_alert_id');
    }

    public function getDataVenditaAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataVenditaAttribute($value)
    {
        $this->attributes['data_vendita'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
