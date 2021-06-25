<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Link;


class GanttController extends Controller
{
    
    public function get(){

        // create instance of task and link
        $tasks = new Task();
        $links = new Link();

        // export to json file
        return response()->json([
            "data" => $tasks->all(),
            "links" => $links->all()
        ]);
    }
}
