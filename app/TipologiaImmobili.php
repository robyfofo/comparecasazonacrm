<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipologiaImmobili extends Model
{
    use SoftDeletes;

    public $table = 'tipologia_immobilis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'insieme',
        'nome',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
