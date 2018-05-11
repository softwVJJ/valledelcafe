<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    protected $fillable = ['id', 'names', 'surnames', 'phone','address','email','employee_roles_id', 'identification_types_id'];

    public function user_types(){
    	return $this->belongsToMany(UserType::class);
    }

    public function employee_roles(){
    	return $this->hasOne(EmployeeRole::class);
    }

    public function identification_types(){
    	return $this->belongTo(IdentificationType::class);
    }

    public function estates(){
        return $this->hasMany(Estate::class);
    }
}
