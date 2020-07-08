<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatoImmobile extends Model
{
    use SoftDeletes;

    public $table = 'stato_immobiles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'stato',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
