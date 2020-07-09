<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipologiaMandatoPratica extends Model
{
    public $table = 'tipologia_mandato_praticas';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nome',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
