<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function designations()
    {
        return $this->hasMany('App\Designation');
    }


    public function users()
    {
        return $this->hasMany('App\User');
    }


}

