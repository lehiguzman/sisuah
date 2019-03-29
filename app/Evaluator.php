<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluator extends Model
{    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'asesor_academico', 'evaluator_1', 'evaluator_2', 'evaluator_3', 'evaluator_4', 'observacion'
    ];
}
