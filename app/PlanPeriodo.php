<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class PlanPeriodo extends Model
{
    protected $table = "plan_periodos";
    protected $fillable = ['id_periodo', 'id_plan', 'prima'];

}


