<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IdentificationType extends Model
{
    protected $fillable = ['id', 'identification_type'];

    public function people(){
        return $this->hasMany(Person::class);
    }
}
