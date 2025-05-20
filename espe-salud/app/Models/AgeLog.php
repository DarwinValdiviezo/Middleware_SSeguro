<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgeLog extends Model
{

    //Este modelo representa cada intento de ingreso de edad antes de laredirección al portal correspondiente.

    protected $fillable = ['age', 'classification'];

}
