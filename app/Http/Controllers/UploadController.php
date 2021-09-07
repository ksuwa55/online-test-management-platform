<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index(){

    }

    public function store(Request $request){
        $request->file('file')->storeAs('','upload_file.pdf');    }
}
