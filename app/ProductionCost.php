<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductionCost extends Model
{
    protected $fillable = ['id', 'value', 'description'];
}
