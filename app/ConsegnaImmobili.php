<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConsegnaImmobili extends Model
{
    use SoftDeletes;

    public $table = 'consegna_immobilis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'consegna',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
