<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = "activities";
    public $primaryKey = "id";
    public $timestamps = true;

    public function attendancelog(){
        return $this->hasMany('App\AttendanceLog');
    }
}
