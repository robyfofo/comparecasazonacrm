<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Filiali extends Model
{
    use SoftDeletes;

    public $table = 'filialis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'agenzia_id',
        'nome',
        'comune_id',
        'indirizzo',
        'cap',
        'email',
        'telefono',
        'fax',
        'email_pec',
        'cellulare',
        'web',
        'codice_fiscale',
        'partita_iva',
        'ccia_numero_rea',
        'capitale_sociale',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function agenzia()
    {
        return $this->belongsTo(Agenzie::class, 'agenzia_id');
    }

    public function comune()
    {
        return $this->belongsTo(Comuni::class, 'comune_id');
    }
}
