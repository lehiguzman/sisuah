<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'period_id', 'user_id', 'profsem_id', 'section_id', 
         'sercom', 'sercom_horas', 'research_line_id', 'titulo', 'planteamiento', 'obj_general', 'status'
    ];
}
