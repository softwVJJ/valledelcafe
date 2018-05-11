<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DryingType extends Model
{
    protected $fillable = ['id', 'name', 'description'];

    public function estates(){
    	return $this->belongsToMany(Estate::class);
    }
}
