<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testcase;
use App\Models\Requirement;
use App\Models\Task;


class DashboardController extends Controller
{
    public function index(){

        // count of requirements
        $count_req = Requirement::count();

        // count of test cases
        $count_testcase = Testcase::count();

        // acvieving rate
        $completed_testcase = Testcase::where('status', 'completed')->count();
        
        if($count_testcase == 0){
            $achieving_rate = 0;
        }else{
            $achieving_rate = $completed_testcase / $count_testcase * 100 . '%';
        }

        // remaining date
        $today = date("Y-m-d");
        $count_task = Task::count();

        if($count_task == 0){
            $remaining_date = '-';
        }else{
            $final_date_record = Task::orderBy('end', 'DESC')->first();
            $final_date = $final_date_record->end;
            // $today = strtotime($today);
            // $final_date = strtotime($final_date);
    
            // $remaining_date = time_diff($today,$final_date);
        }

        return view('dashboard')->with('count_req', $count_req)
                                ->with('count_testcase', $count_testcase)
                                ->with('achieving_rate', $achieving_rate)
                                ->with('final_date', $final_date)
                                ;
    }
    // public function time_diff($time_from, $time_to) 
    // {
    //     // 日時差を秒数で取得
    //     $dif = $time_to - $time_from;

    //     // 日付単位の差
    //     $dif_days = (strtotime(date("Y-m-d", $dif)) - strtotime("1970-01-01")) / 86400;
    //     return "{$dif_days}days ";
    // }
}
