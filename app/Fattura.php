<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Fattura extends Model
{
    public $table = 'fatturas';

    protected $dates = [
        'data_emissione',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'cliente_nome',
        'cliente_cognome',
        'cliente_ragione_sociale',
        'cliente_codice_fiscale',
        'cliente_partita_iva',
        'cliente_indirizzo',
        'filiale_agenzia_nome',
        'fattura_numero',
        'fattura_anno',
        'data_emissione',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getDataEmissioneAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDataEmissioneAttribute($value)
    {
        $this->attributes['data_emissione'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
