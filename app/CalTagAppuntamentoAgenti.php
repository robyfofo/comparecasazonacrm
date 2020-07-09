<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class CalTagAppuntamentoAgenti extends Model implements HasMedia
{
    use HasMediaTrait;

    public $table = 'cal_tag_appuntamento_agentis';

    protected $dates = [
        'data_ora',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'label',
        'data_ora',
        'agente_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'appuntamento_id',
    ];

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->width(50)->height(50);

    }

    public function appuntamento()
    {
        return $this->belongsTo(Appuntamenti::class, 'appuntamento_id');

    }

    public function agente()
    {
        return $this->belongsTo(AgentProfile::class, 'agente_id');

    }

    public function getDataOraAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;

    }

    public function setDataOraAttribute($value)
    {
        $this->attributes['data_ora'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;

    }
}
