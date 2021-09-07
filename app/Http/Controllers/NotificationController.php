<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testcase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;


class NotificationController extends Controller
{
    public function __construct()
    {
        // count of test cases that is succeed
        $count_succeed_testcase = Testcase::where('status', 'Succeed')->count();
        $count_failed_testcase = Testcase::where('status', 'Failed')->count();

            // Sharing is caring
        View::share('count_succeed_testcase', $count_succeed_testcase);
    }
}
