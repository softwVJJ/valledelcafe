<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CupProfile extends Model
{
    protected $fillable = ['id', 'cup_score', 'aroma', 'flavor','acidity','body','sweetness', 'balance_value', 'balance_description', 'total_input_weight', 'estimated_output'];

    public function input_lots(){
        return $this->belongTo(InputLot::class);
    }
}
