<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Leave extends Model
{
    use SoftDeletes;
    protected $fillable = ['leave_type'];
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
