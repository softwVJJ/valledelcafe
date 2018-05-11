<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeRole extends Model
{
    protected $fillable = ['id', 'name', 'description'];

    public function people(){
        return $this->belongTo(Person::class);
    }
}
