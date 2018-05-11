<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $fillable = ['id', 'name', 'departments_id'];

    public function departments(){
        return $this->belongTo(Department::class);
    }

    public function estates(){
        return $this->hasMany(Estate::class);
    }
}
