<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendanceLog extends Model
{
    protected $table = "attendance_logs";
    public $primaryKey = "id";
    public $timestamps = true;

    public function members(){
        return $this->belongsTo('App\Member');
    }

    public function activities(){
        return $this->belongsTo('App\Activity');
    }
}
