<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppuntamentoTipologie extends Model
{
    public $table = 'appuntamento_tipologies';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nome',
        'pos',
        'bgcolor',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
