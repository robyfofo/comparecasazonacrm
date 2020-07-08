<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipologiaContrattoPrezzo extends Model
{
    public $table = 'tipologia_contratto_prezzos';

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
