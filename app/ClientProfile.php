<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class ClientProfile extends Model implements HasMedia
{
    use HasMediaTrait;

    public $table = 'client_profiles';

    protected $appends = [
        'files',
    ];

    protected $dates = [
        'birthday',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'agente_id',
        'filiale_id',
        'tipo_id',
        'ruolo',
        'settore',
        'indirizzo',
        'civico',
        'cap',
        'comune_id',
        'provincia_id',
        'azienda',
        'piva',
        'telefono',
        'cellulare',
        'fax',
        'livello',
        'note',
        'birthday',
        'nazione',
        'nome_2',
        'cognome_2',
        'affinita',
        'email_2',
        'comune_2_id',
        'prov_2_id',
        'indirizzo_2',
        'civico_2',
        'cap_2',
        'telefono_2',
        'cellulare_2',
        'fax_2',
        'stato',
        'email_istituzionale',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);
    }

    public function agente()
    {
        return $this->belongsTo(AgentProfile::class, 'agente_id');
    }

    public function filiale()
    {
        return $this->belongsTo(Filiali::class, 'filiale_id');
    }

    public function tipo()
    {
        return $this->belongsTo(ClientiTipologium::class, 'tipo_id');
    }

    public function comune()
    {
        return $this->belongsTo(Comuni::class, 'comune_id');
    }

    public function provincia()
    {
        return $this->belongsTo(Province::class, 'provincia_id');
    }

    public function getBirthdayAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function comune_2()
    {
        return $this->belongsTo(Comuni::class, 'comune_2_id');
    }

    public function prov_2()
    {
        return $this->belongsTo(Province::class, 'prov_2_id');
    }

    public function getFilesAttribute()
    {
        return $this->getMedia('files');
    }
}
