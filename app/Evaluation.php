<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'period_id', 'user_id', 'proposal_id', 'prof_id', 'resultado', 'observacion'
    ];
}
