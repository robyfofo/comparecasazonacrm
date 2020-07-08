<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GarageImmobile extends Model
{
    use SoftDeletes;

    public $table = 'garage_immobiles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'garage',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
