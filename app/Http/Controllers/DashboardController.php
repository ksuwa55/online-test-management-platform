<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testcase;
use App\Models\Requirement;
use App\Models\Task;
use PDF;

class DashboardController extends Controller
{
    public function index(){
        // role of user
        $user = \Auth::user();
        $user_role = $user->role;

        // count of requirements
        $count_req = Requirement::count();

        // count of test cases
        $count_testcase = Testcase::count();

        // acvieving rate
        $completed_testcase = Testcase::where('status', 'Accepted')->count();
        
        if($count_testcase == 0){
            $achieving_rate = 0;
        }else{
            $achieving_rate = $completed_testcase / $count_testcase * 100 . '%';
        }

        // remaining date
        $today = date("Y-m-d");
        $count_task = Task::count();

        if($count_task == 0){
            $final_date = '-';
        }else{
            $final_date_record = Task::orderBy('end', 'DESC')->first();
            $final_date = $final_date_record->end;
            // $today = strtotime($today);
            // $final_date = strtotime($final_date);
    
            // $remaining_date = time_diff($today,$final_date);
        }

        // count of test cases that is succeed
        $count_succeed_testcase = Testcase::where('status', 'Succeed')->count();
        $count_failed_testcase = Testcase::where('status', 'Failed')->count();
        $count_waiting_testcase = Testcase::where('status', 'Waiting')->count();
        $count_accepted_testcase = Testcase::where('status', 'Accepted')->count();

        $total_count = $count_succeed_testcase + $count_failed_testcase + $count_waiting_testcase + $count_accepted_testcase;

        return view('dashboard')->with('count_req', $count_req)
                                ->with('count_testcase', $count_testcase)
                                ->with('achieving_rate', $achieving_rate)
                                ->with('final_date', $final_date)
                                ->with('user_role', $user_role)
                                ->with('count_succeed_testcase',$count_succeed_testcase)
                                ->with('count_failed_testcase',$count_failed_testcase)
                                ->with('count_waiting_testcase',$count_waiting_testcase)
                                ->with('count_accepted_testcase',$count_accepted_testcase)
                                ->with('total_count',$total_count);
    }
    // public function time_diff($time_from, $time_to) 
    // {
    //     // 日時差を秒数で取得
    //     $dif = $time_to - $time_from;

    //     // 日付単位の差
    //     $dif_days = (strtotime(date("Y-m-d", $dif)) - strtotime("1970-01-01")) / 86400;
    //     return "{$dif_days}days ";
    // }
    
    // Generate PDF
    public function createPDF() {

        // count of requirements
        $count_req = Requirement::count();

        // count of test cases
        $count_testcase = Testcase::count();

        // acvieving rate
        $completed_testcase = Testcase::where('status', 'Accepted')->count();
        
        if($count_testcase == 0){
            $achieving_rate = 0;
        }else{
            $achieving_rate = $completed_testcase / $count_testcase * 100 . '%';
        }

        // remaining date
        $today = date("Y-m-d");
        $count_task = Task::count();

        if($count_task == 0){
            $final_date = '-';
        }else{
            $final_date_record = Task::orderBy('end', 'DESC')->first();
            $final_date = $final_date_record->end;
            // $today = strtotime($today);
            // $final_date = strtotime($final_date);

            // $remaining_date = time_diff($today,$final_date);
        }

        // // share data to view
        // view()->with('count_req', $count_req)
        //         ->with('count_testcase', $count_testcase)
        //         ->with('achieving_rate', $achieving_rate)
        //         ->with('final_date', $final_date)
        //         ;
        // count of test cases that is succeed
        $count_succeed_testcase = Testcase::where('status', 'Succeed')->count();
        $count_failed_testcase = Testcase::where('status', 'Failed')->count();
        $count_waiting_testcase = Testcase::where('status', 'Waiting')->count();
        $count_accepted_testcase = Testcase::where('status', 'Accepted')->count();

        $data = [
            'count_req' => $count_req,
            'count_testcase' => $count_testcase,
            'achieving_rate' => $achieving_rate,
            'final_date' => $final_date,
            'count_succeed_testcase' => $count_succeed_testcase,
            'count_failed_testcase' => $count_failed_testcase,
            'count_waiting_testcase' => $count_waiting_testcase,
            'count_accepted_testcase' => $count_accepted_testcase
        ];

        $pdf = PDF::loadView('report', $data);
  
        // download PDF file with download method
        return $pdf->download('pdf_file.pdf');
      }
}
