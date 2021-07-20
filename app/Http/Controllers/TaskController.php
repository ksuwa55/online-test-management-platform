<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Testcase;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::user();
        $user_role = $user->role;

        $all_users = User::get();

        // count of test cases that is succeed
        $count_succeed_testcase = Testcase::where('status', 'Succeed')->count();
        $count_failed_testcase = Testcase::where('status', 'Failed')->count();

       
        $tasks = Task::get();
        return view('tasks')->with('tasks',$tasks)
                            ->with('user_role',$user_role)
                            ->with('all_users', $all_users)
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = \Auth::user();
        $user_project_cd = $user->project_cd;

        $task = new Task();
        $task->title = $request->title;
        $task->start = $request->start;
        $task->end = $request->end;
        $task->person_email = $request->person_email;
        $task->project_cd = $user_project_cd;

        $task->save();
        session()->flash('flash_message', 'task successfully stored');
        return redirect('tasks');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::findOrFail($id);
        // count of test cases that is succeed
        $count_succeed_testcase = Testcase::where('status', 'Succeed')->count();
        $count_failed_testcase = Testcase::where('status', 'Failed')->count();

        return view('tasksedit')->with('task',$task)
                                ->with('count_succeed_testcase',$count_succeed_testcase)
                                ->with('count_failed_testcase',$count_failed_testcase);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $request->validate([
            'title' => 'required'
        ]);

        $task->title = $request->title;
        $task->start = $request->start;
        $task->end = $request->end;
        $task->person_email = $request->person_email;

        $task->save();
        session()->flash('flash_message', 'task successfully updated');
        return redirect('tasks');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        session()->flash('flash_message', 'task successfully deleted');
        return redirect('tasks');
    }
}
