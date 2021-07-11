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
        return view('testcases')->with('testcases',$testcases)
                                ->with('statuses',$statuses)
                                ->with('user_role',$user_role);
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

        //file testdata
        if($request->file('file_testdata')){
            $file_name_testdata = $request->file('file_testdata')->getClientOriginalName();
            $request->file('file_testdata')->storeAs('public/'.$user_project_cd.'/'.$testcase->requirement_cd.'/'.$testcase->testcase_cd.'/testdata', $file_name_testdata);
            $testcase->testdata = $file_name_testdata;
        }
        
        $testcase->save();
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
        
        return view('testcasesedit', compact('testcase'));
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

        //title
        $testcase->title = ($request->title == null) ? $testcase->title : $request->title;

        //status
        $testcase->status = ($request->status == null) ? $testcase->status : $request->status;

        // the case that status == 'accept' and role == 'tester'
        if($user_role == 'Tester' && $request->status == 'Accepted'){
            return redirect('testcases');
        }

         //file testdata
        if($request->file('file_testdata')){
            $file_name_testdata = $request->file('file_testdata')->getClientOriginalName();
            $request->file('file_testdata')->storeAs('public/'.$user_project_cd.'/'.$testcase->requirement_cd.'/'.$testcase->testcase_cd.'/testdata', $file_name_testdata);
            $testcase->testdata = $file_name_testdata;
        }
        
        //file evidence
        if($request->file('file_evidence')){
            $file_name_evidence = $request->file('file_evidence')->getClientOriginalName();
            $request->file('file_evidence')->storeAs('public/'.$user_project_cd.'/'.$testcase->requirement_cd.'/'.$testcase->testcase_cd.'/evidence', $file_name_evidence);
            $testcase->evidence = $file_name_evidence;
        }
       
        $testcase->save();
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

        return redirect('testcases');
    }
}
