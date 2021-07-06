<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Requirement;
use App\Models\Testcase;
use Illuminate\Support\Facades\Storage;


class ReqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $requirements = Requirement::orderby('requirement_cd', 'asc')->get();
        return view('requirements',['requirements'=>$requirements]);
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

        $requirement = new Requirement();
        $requirement->requirement_cd = $request->requirement_cd;
        $requirement->title = $request->title;
        $requirement->description = $request->description;
        $requirement->project_cd = $user_project_cd;

        $requirement->save();
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
        
        return view('requirementsedit', compact('requirement'));
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

        Storage::deleteDirectory('public/'.$project_cd.'/'.$requirement_cd);

        $requirement->delete();
        return redirect('requirements');
    }

    public function display($id){
        $display_requirement = Requirement::findOrFail($id);
        $requirements = Requirement::orderby('requirement_cd', 'asc')->get();

        $testcases = Testcase::where('requirement_cd', '=' ,$display_requirement->requirement_cd)->get();

        return view('requirements')
               ->with('display_requirement',$display_requirement)
               ->with('requirements',$requirements)     
               ->with('testcases',$testcases);
    }
}
