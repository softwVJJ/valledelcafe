<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoffeeLine extends Model
{
    protected $fillable = ['id', 'name', 'description'];

    public function output_lots(){
        return $this->belongTo(OutputLot::class);
    }
}
