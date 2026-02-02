<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function management_team(Request $request){
        echo "management_team";
    }
    public function volunteers_team(Request $request){
        echo "volunteers_team";
    }
}
