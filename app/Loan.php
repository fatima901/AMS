<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
