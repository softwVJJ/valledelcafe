<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YieldFactor extends Model
{
    protected $fillable = ['id', 'yield_factor', 'pasilla_percentage', 'white_percentage','fermented_percentage','berry_borer_percentage'];

    public function input_lots(){
        return $this->belongTo(InputLot::class);
    }
}
