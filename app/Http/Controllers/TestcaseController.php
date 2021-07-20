<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Testcase;
use App\Models\Requirement;
use Illuminate\Support\Facades\Storage;


class TestcaseController extends Controller
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
        $testcases = Testcase::orderby('testcase_cd', 'asc')->get();
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

        
        // count of test cases that is succeed
        $count_succeed_testcase = Testcase::where('status', 'Succeed')->count();
        $count_failed_testcase = Testcase::where('status', 'Failed')->count();

        return view('testcases')->with('testcases',$testcases)
                                ->with('statuses',$statuses)
                                ->with('user_role',$user_role)                                   
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

        $testcase = new Testcase();

        // validate requirement_cd and project_cd
        $requirements = Requirement::get(); // this is limited by project_cd... parhaps
        foreach($requirements as $requirement){
            $requirement_cds[] = $requirement->requirement_cd; 
        }

        if(in_array($request->requirement_cd, $requirement_cds)){
            $testcase->requirement_cd = $request->requirement_cd;
        }else{
            return redirect('testcases');
        }

        // asigne to test case
        $testcase->testcase_cd = $request->testcase_cd;
        $testcase->title = $request->title;
        $testcase->project_cd = $user_project_cd;
        $testcase->status = 'Waiting';
        $testcase->description = $request->description;

        //file testdata
        if($request->file('file_testdata')){
            $file_name_testdata = $request->file('file_testdata')->getClientOriginalName();
            $request->file('file_testdata')->storeAs('public/'.$user_project_cd.'/'.$testcase->requirement_cd.'/'.$testcase->testcase_cd.'/testdata', $file_name_testdata);
            $testcase->testdata = $file_name_testdata;
        }
        
        $testcase->save();
        session()->flash('flash_message', 'test case successfully stored');
        return redirect('testcases');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testcase  $testcase
     * @return \Illuminate\Http\Response
     */
    public function show(Testcase $testcase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testcase  $testcase
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testcase= Testcase::findOrFail($id);
        // count of test cases that is succeed
        $count_succeed_testcase = Testcase::where('status', 'Succeed')->count();
        $count_failed_testcase = Testcase::where('status', 'Failed')->count();

        return view('testcasesedit')->with('testcase',$testcase)
                                    ->with('count_succeed_testcase',$count_succeed_testcase)
                                    ->with('count_failed_testcase',$count_failed_testcase);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testcase  $testcase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $testcase = Testcase::findOrFail($id);
        $user = \Auth::user();
        $user_project_cd = $user->project_cd;
        $user_role = $user->role;

        // check whether already file exists
        $current_testdata = ($testcase->testdata != null) ? $testcase->testdata : null;
        $current_evidence = ($testcase->evidence != null) ? $testcase->evidence : null;

        //title
        $testcase->title = ($request->title == null) ? $testcase->title : $request->title;

        //status
        $testcase->status = ($request->status == null) ? $testcase->status : $request->status;

        //description
        $testcase->description = ($request->description == null) ? $testcase->description : $request->description;

        //bug comment
        $testcase->bug_comment = ($request->bug_comment == null) ? $testcase->bug_comment : $request->bug_comment;

        // the case that status == 'accept' and role == 'tester'
        if($user_role == 'Tester' && $request->status == 'Accepted'){
            return redirect('testcases');
        }

         //file testdata
        if($request->file('file_testdata')){
            $file_name_testdata = $request->file('file_testdata')->getClientOriginalName();
            $request->file('file_testdata')->storeAs('public/'.$user_project_cd.'/'.$testcase->requirement_cd.'/'.$testcase->testcase_cd.'/testdata', $file_name_testdata);
            $testcase->testdata = $file_name_testdata;

            if($current_testdata != null){
                Storage::delete('public/'.$user_project_cd.'/'.$testcase->requirement_cd.'/'.$testcase->testcase_cd.'/testdata/'.$current_testdata);
            }
        }
        
        //file evidence
        if($request->file('file_evidence')){
            $file_name_evidence = $request->file('file_evidence')->getClientOriginalName();
            $request->file('file_evidence')->storeAs('public/'.$user_project_cd.'/'.$testcase->requirement_cd.'/'.$testcase->testcase_cd.'/evidence', $file_name_evidence);
            $testcase->evidence = $file_name_evidence;

            if($current_evidence != null){
                Storage::delete('public/'.$user_project_cd.'/'.$testcase->requirement_cd.'/'.$testcase->testcase_cd.'/evidence/'.$current_evidence);
            }
        }
       
        $testcase->save();
        session()->flash('flash_message', 'test case successfully updated');
        return redirect('testcases');
    }

    public function downloadTestdataFile($id){
        // project _cd
        $testcase = Testcase::findOrFail($id);
        $user = \Auth::user();
        $project_cd = $user->project_cd;

        // requirement_cd
        $testcase = Testcase::findOrFail($id);
        $requirement_cd = $testcase->requirement_cd;

        // testcase_cd
        $testcase_cd = $testcase->testcase_cd;

        // condition by the type of file
        $file_name = $testcase->testdata;
        $file_path = 'public/'.$project_cd.'/'.$requirement_cd.'/'.$testcase_cd.'/testdata/'.$file_name;

        return Storage::download($file_path);
    }

    public function downloadEvidenceFile($id){
        // project _cd
        $testcase = Testcase::findOrFail($id);
        $user = \Auth::user();
        $project_cd = $user->project_cd;

        // requirement_cd
        $testcase = Testcase::findOrFail($id);
        $requirement_cd = $testcase->requirement_cd;

        // testcase_cd
        $testcase_cd = $testcase->testcase_cd;

        // condition by the type of file
        $file_name = $testcase->evidence;
        $file_path = 'public/'.$project_cd.'/'.$requirement_cd.'/'.$testcase_cd.'/evidence/'.$file_name;

        return Storage::download($file_path);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testcase  $testcase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $testcase = Testcase::findOrFail($id);
        $user = \Auth::user();
        $project_cd = $user->project_cd;    // project_cd

        $testcase = Testcase::findOrFail($id);

        $requirement_cd = $testcase->requirement_cd; // requirement_cd
        $testcase_cd = $testcase->testcase_cd;       // testcase_cd

        Storage::deleteDirectory('public/'.$project_cd.'/'.$requirement_cd.'/'.$testcase_cd);

        $testcase->delete();
        session()->flash('flash_message', 'test case successfully deleted');
        return redirect('testcases');
    }

    public function display_descriptions($id){
        $testcase = Testcase::findOrFail($id);

        // count of test cases that is succeed
        $count_succeed_testcase = Testcase::where('status', 'Succeed')->count();
        $count_failed_testcase = Testcase::where('status', 'Failed')->count();

        return view('testcase_desc')->with('testcase', $testcase)
                                    ->with('count_succeed_testcase',$count_succeed_testcase)
                                    ->with('count_failed_testcase',$count_failed_testcase);
    }
}
