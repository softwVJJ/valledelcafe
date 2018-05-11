<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['id', 'name'];

    public function municipalities(){
        return $this->hasMany(Municipality::class);
    }
}
