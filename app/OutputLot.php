<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OutputLot extends Model
{
    protected $fillable = ['id', 'kilos_number', 'input_lots_id', 'coffee_lines_id'];

    public function input_lots(){
        return $this->belongTo(InputLot::class);
    }

    public function coffee_lines(){
        return $this->hasOne(CoffeeLine::class);
    }
}
