<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Requirement;
use App\Models\Testcase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\Validation\Rule;

class ReqController extends Controller
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

        // count of test cases that is succeed
        $count_succeed_testcase = Testcase::where('status', 'Succeed')->count();
        $count_failed_testcase = Testcase::where('status', 'Failed')->count();

        $statuses = [
            [
                'label' => 'Waiting',
                'value' => 'Waiting',
            ],
            [
                'label' => 'Failed',
                'value' => 'Failed',
            ],
            [
                'label' => 'Succeed',
                'value' => 'Succeed',
            ],
            [
                'label' => 'Accepted',
                'value' => 'Accepted',
            ],
        ];

        $requirements = Requirement::orderby('requirement_cd', 'asc')->get();
        return view('requirements')->with('requirements',$requirements)
                                   ->with('user_role', $user_role)
                                   ->with('count_succeed_testcase',$count_succeed_testcase)
                                   ->with('count_failed_testcase',$count_failed_testcase)
                                   ->with('statuses',$statuses)
                                   ;
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

        $request->validate([
            'requirement_cd' => [
            Rule::unique('requirements')->where('project_cd', $user_project_cd),
        ],
        ]);
        $requirement = new Requirement();
        $requirement->requirement_cd = $request->requirement_cd;
        $requirement->title = $request->title;
        $requirement->description = $request->description;
        $requirement->project_cd = $user_project_cd;



        $requirement->save();
        session()->flash('flash_message', 'requirement successfully stored');
        return redirect('requirements');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requirement= Requirement::findOrFail($id);
        
        // count of test cases that is succeed
        $count_succeed_testcase = Testcase::where('status', 'Succeed')->count();
        $count_failed_testcase = Testcase::where('status', 'Failed')->count();

        return view('requirementsedit')->with('requirement', $requirement)
                                       ->with('count_succeed_testcase',$count_succeed_testcase)
                                       ->with('count_failed_testcase',$count_failed_testcase);
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
        $requirement = Requirement::findOrFail($id);
        $user = \Auth::user();
        $user_project_cd = $user->project_cd;

        //title
        $requirement->title = ($request->title == null) ? $requirement->title : $request->title;

        //description
        $requirement->description = ($request->title == null) ? $requirement->description : $request->description;

        $requirement->save();
        session()->flash('flash_message', 'requirement successfully updated');
        return redirect('requirements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \Auth::user();
        $project_cd = $user->project_cd;    // project_cd

        $requirement = Requirement::findOrFail($id);
        $requirement_cd = $requirement->requirement_cd; // requirement_cd

        $testcases = Testcase::where('requirement_cd', $requirement_cd)->get();

        Storage::deleteDirectory('public/'.$project_cd.'/'.$requirement_cd);

        foreach($testcases as $testcase){
            $testcase->delete();
        }
        
        $requirement->delete();
        session()->flash('flash_message', 'requirement successfully deleted');
        return redirect('requirements');
    }

    public function display($id){
        $user = \Auth::user();
        $user_role = $user->role;

        $display_requirement = Requirement::findOrFail($id);
        $requirements = Requirement::orderby('requirement_cd', 'asc')->get();

        $testcases = Testcase::where('requirement_cd', '=' ,$display_requirement->requirement_cd)->get();
        
        // count of test cases that is succeed
        $count_succeed_testcase = Testcase::where('status', 'Succeed')->count();
        $count_failed_testcase = Testcase::where('status', 'Failed')->count();

        $statuses = [
            [
                'label' => 'Waiting',
                'value' => 'Waiting',
            ],
            [
                'label' => 'Failed',
                'value' => 'Failed',
            ],
            [
                'label' => 'Succeed',
                'value' => 'Succeed',
            ],
            [
                'label' => 'Accepted',
                'value' => 'Accepted',
            ],
        ];

        return view('requirements')
               ->with('display_requirement',$display_requirement)
               ->with('requirements',$requirements)     
               ->with('testcases',$testcases)
               ->with('user_role',$user_role)
               ->with('count_succeed_testcase',$count_succeed_testcase)
               ->with('count_failed_testcase',$count_failed_testcase)
               ->with('statuses',$statuses)
               ;
    }
}
