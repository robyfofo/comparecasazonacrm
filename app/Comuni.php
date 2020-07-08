<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comuni extends Model
{
    use SoftDeletes;

    public $table = 'comunis';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nome',
        'cap',
        'prefisso',
        'provincia',
        'prov_id',
        'stato',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function prov()
    {
        return $this->belongsTo(Province::class, 'prov_id');
    }
}
