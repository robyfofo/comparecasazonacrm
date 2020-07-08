<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppuntamentoStati extends Model
{
    public $table = 'appuntamento_statis';

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
