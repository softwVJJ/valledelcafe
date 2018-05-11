<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductionLot extends Model
{
    protected $fillable = ['id', 'start_time', 'end_time'];
}
