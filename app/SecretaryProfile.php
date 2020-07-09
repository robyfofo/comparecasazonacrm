<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SecretaryProfile extends Model
{
    use SoftDeletes;

    public $table = 'secretary_profiles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nome',
        'indirizzo',
        'cap',
        'telefono',
        'cellulare',
        'fax',
        'lunedi_inizio',
        'lunedi_fine',
        'martedi_inizio',
        'martedi_fine',
        'mercoledi_inizio',
        'mercoledi_fine',
        'giovedi_inizio',
        'giovedi_fine',
        'venerdi_inizio',
        'venerdi_fine',
        'sabato_inizio',
        'sabato_fine',
        'domenica_inizio',
        'domenica_fine',
        'comune_id',
        'filiale_id',
        'email_istituzionale',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function comune()
    {
        return $this->belongsTo(Comuni::class, 'comune_id');
    }

    public function filiale()
    {
        return $this->belongsTo(Filiali::class, 'filiale_id');
    }
}
