<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Designation extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'designation_name', 'department_id'
    ];



    public function department()
    {
        return $this->belongsTo('App\Department');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
