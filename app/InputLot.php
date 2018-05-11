<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InputLot extends Model
{
    protected $fillable = ['id', 'input_date', 'kilos_number', 'available_kilos','estates_id','cup_profiles_id','yield_factors_id','production_lots_id'];

    public function estates(){
        return $this->belongTo(Estate::class);
    }

    public function cup_profiles(){
        return $this->hasOne(CupProfile::class);
    }

    public function yield_factors(){
        return $this->hasOne(YieldFactor::class);
    }

    public function production_lots(){
        return $this->hasOne(ProductionLot::class);
    }

    public function output_lots(){
        return $this->hasMany(OutputLot::class);
    }
}
