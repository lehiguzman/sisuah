<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Specific extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'proposal_id', 'contenido'
    ];
}
