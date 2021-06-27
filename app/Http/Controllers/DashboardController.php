<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testcase;
use App\Models\Requirement;


class DashboardController extends Controller
{
    public function index(){
        //count of requirements
        $count_req = Requirement::count();
        //count of test cases
        $count_testcase = Testcase::count();
    	return view('dashboard')->with('count_req', $count_req)->with('count_testcase', $count_testcase);
    }
}
