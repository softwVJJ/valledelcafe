<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoffeeVariety extends Model
{
    protected $fillable = ['id', 'name'];

    public function estates(){
    	return $this->belongsToMany(Estate::class);
    }
}
