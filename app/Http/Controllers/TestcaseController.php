<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Testcase;
use App\Models\Requirement;


class TestcaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testcases = Testcase::get();
        $statuses = [
            [
                'label' => 'Not start',
                'value' => 'Not start',
            ],
            [
                'label' => 'In progress',
                'value' => 'In progress',
            ],
            [
                'label' => 'Pending',
                'value' => 'Pending',
            ],
            [
                'label' => 'Completed',
                'value' => 'Completed',
            ],
        ];
        return view('testcases')->with('testcases',$testcases)
                                ->with('statuses',$statuses);
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
        $testcase->testdata = $request->testdata;
        $testcase->evidence = $request->testcase_cd.'_evidence';
        $testcase->status = 'Not start';

        //file
        $file_name = $request->file('file')->getClientOriginalName();
        $request->file('file')->storeAs('public/'.$user_project_cd.'/'.$testcase->requirement_cd.'/'.$testcase->testcase_cd, $file_name);

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


        //title
        if($request->title == null){
            $testcase->title = $testcase->title;
        }else{
            $testcase->title = $request->title;
        }

        //status
        if($request->status == null){
            $testcase->status = $testcase->status; 
        }else{
            $testcase->status  = $request->status ;
        }

        // //file
        // $file_name = $request->file('file')->getClientOriginalName();
        // $request->file('file')->storeAs('public/'.$user_project_cd.'/'.$testcase->requirement_cd.'/'.$testcase->testcase_cd, $file_name);

        $testcase->save();
        return redirect('testcases');
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
        $testcase->delete();
        return redirect('testcases');
    }
}
