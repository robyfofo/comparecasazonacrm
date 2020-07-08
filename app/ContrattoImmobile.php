<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContrattoImmobile extends Model
{
    public $table = 'contratto_immobiles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'contratto',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
