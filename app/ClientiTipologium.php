<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClientiTipologium extends Model
{
    use SoftDeletes;

    public $table = 'clienti_tipologia';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'tipologia',
        'stato',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
