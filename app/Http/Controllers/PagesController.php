<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use App\AttendanceLog;
use App\Member;
use DB;

class PagesController extends Controller
{
    public function index(){
        $acts = Activity::all();
        return view('activities.index')->with('activities', $acts);
    }

    public function view($id){
        $members = Member::all();
        $activity = Activity::find($id);
        $logs = AttendanceLog::where('activity_id', $id)->get();
        return view('activities.display')->with('members', $members)->with('activity', $activity)->with('logs', $logs);
    }

    public function create(){
        return view('activities.create');
    }

    public function edit(Request $request, $id)
    {
        $activity = Activity::select('*')->where('id', $id)->get();
        return view('activities.edit')->with('activity', $activity);
    }
}
