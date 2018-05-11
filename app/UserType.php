<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    protected $fillable = ['id', 'name'];

    public function people(){
    	return $this->belongsToMany(Person::class);
    }
}
