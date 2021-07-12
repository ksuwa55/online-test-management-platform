<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Testcase;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $user_email = $user->email;
        $tasks = Task::get();

        
        // count of test cases that is succeed
        $count_succeed_testcase = Testcase::where('status', 'Succeed')->count();
        $count_failed_testcase = Testcase::where('status', 'Failed')->count();

        return view('calendar')->with('tasks',$tasks)
                               ->with('user_email',$user_email)
                               ->with('count_succeed_testcase',$count_succeed_testcase)
                               ->with('count_failed_testcase',$count_failed_testcase);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $user = \Auth::user();
        // $user_project_cd = $user->project_cd;

        // $task = new Task();
        // $task->title = $request->title;
        // $task->start = $request->start;
        // $task->end = $request->end;
        // $task->person_email = $request->person_email;
        // $task->project_cd = $user_project_cd;

        // $task->save();
        // return redirect('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
