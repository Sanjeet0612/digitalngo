<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function management_team(Request $request){
        $eventList = array();
        return view('admin.team.management_team',compact('eventList'));
    }
    public function add_management_team(Request $request){
        return view('admin.team.management_form');
    }
    // Volunteers Section
    public function volunteers_team(Request $request){
        return view('admin.team.volunteers_team');
    }
    
}
