<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AttendanceLog;
use DB;

class AttendanceController extends Controller
{
    public function time_in(Request $request, $member_id, $activity_id){
        $log = new AttendanceLog;
        $log->activity_id = $activity_id;
        $log->member_id = $member_id;
        date_default_timezone_set("Asia/Singapore");
        $log->time_in = date("H:i:s");
        $log->time_out = "00:00:00";
        $log->save();
        return redirect("/viewActivity/$activity_id")->with('success', "A member has attended the event!");
    }

    public function time_out(Request $request, $attendance_log_id, $activity_id){
        $log = AttendanceLog::find($attendance_log_id);
        date_default_timezone_set("Asia/Singapore");
        $log->time_out = date("H:i:s");
        $log->save();
        return redirect("/viewActivity/$activity_id")->with('success', 'A member has signed out the event!');
    }
}
