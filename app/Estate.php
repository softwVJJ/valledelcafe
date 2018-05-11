<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    protected $fillable = ['id', 'name', 'address', 'altitude','vereda','people_id','municipalities_id'];

    public function coffee_varieties(){
    	return $this->belongsToMany(CoffeeVariety::class);
    }

    public function drying_types(){
    	return $this->belongsToMany(DryingType::class);
    }

    public function municipalities(){
        return $this->belongTo(Municipality::class);
    }

    public function input_lots(){
        return $this->hasMany(InputLot::class);
    }

    public function people(){
        return $this->belongTo(Person::class);
    }
}
