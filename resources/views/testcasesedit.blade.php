@extends('layout')
    
@section('main-content')
    

<div class="card" style="width:50%; margin-top:5em; margin-left:15em;">
    <form action="{{ route('testcases.update' , $testcase->id) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h4 class="card-header text-center"> Update Test Case</h4>
        <div class="card-body">
            <div class="form-group mb-3">
                <input type="text" placeholder="Title" id="title_edit" class="form-control" name="title"
                value="{{ $testcase->title }}"  required autofocus>
            </div>

            <!-- file upload testdata -->
            <div class="form-group mb-3">
                <label for="file_testdata">testdata</label>
                <input type="file" id="file_testdata" name="file_testdata" class="form-control"> 
            </div> 

            <!-- file upload evidence -->
            <div class="form-group mb-3">
                <label for="file_evidence">evidence</label>
                <input type="file" id="file_evidence" name="file_evidence" class="form-control"> 
            </div> 

            
            <div class="form-group mb-3">
                <textarea type="text"  placeholder="Description" class="form-control" id="description" name="description"
                rows="5">{{ $testcase->description }}</textarea>
            </div>

            <div class="form-group mb-3">
                <textarea type="text"  placeholder="Bug Detail" class="form-control" id="bug_comment" name="bug_comment"
                rows="5">{{ $testcase->bug_comment }}</textarea>
            </div>

            <a href="{{ route('testcases.index') }}" class="btn btn-secondary mr-2"><i class="fa fa-arrow-left"></i>Back</a>

            <button type="submit" class="btn btn-info ">                
                <i class="fa fa-check"></i>
                Update</button>
        </div>
    </form>
</div>
    
@endsection
