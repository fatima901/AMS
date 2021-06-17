<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['department_name','type', 'user_id','attendance_date', 'attendance_status'];

}
