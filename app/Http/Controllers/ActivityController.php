<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activity;
use DB;

class ActivityController extends Controller
{
    public function store(Request $request){
        $act = new Activity;
        $act->name = $request->name;
        $act->date = $request->date;
        $act->rodriguez= $request->rodriguez;
        $act->asilo= $request->asilo;
        $act->abella= $request->abella;
        $act->start = $request->start;
        $act->end = $request->end;
        $act->venue = $request->venue;
        $act->save();
        return redirect('/');
    }
  
    public function update(Request $request){
        Activity::where('id', $request->id)->update(array('name' => $request->name,
        'date' => $request->date,
        'start' => $request->start,
        'end' => $request->end,
         'venue' => $request->venue));
         return redirect('/')->with('success', 'Activity Successfuly Modified!');
    }
}
