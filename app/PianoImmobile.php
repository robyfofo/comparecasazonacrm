<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PianoImmobile extends Model
{
    use SoftDeletes;

    public $table = 'piano_immobiles';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'piano',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
