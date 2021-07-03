<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testcase;
use App\Models\Requirement;

class TestcaseInReqController extends Controller
{
    public function display($id){
        $requiement = Requirement::findOrFail($id);

        $requiement_id = $requiement->id;
        return view('requirements')->with('requiement_id',$requiement_id);
    }
}
