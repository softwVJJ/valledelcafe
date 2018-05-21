<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class YieldFactor extends Model
{
    protected $fillable = ['id', 'yield_factor', 'pasilla_percentage', 'white_percentage','fermented_percentage','berry_borer_percentage','merma','d_x_machine','machine_trilla','machine_desimetric',
                            'machine_electronic','machine_tostion','machine_select'];

    public function input_lots(){
        return $this->belongTo(InputLot::class);
    }
}
