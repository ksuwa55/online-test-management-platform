@extends('layout')
    
@section('main-content')
    

<div class="card" style="width:50%; margin-top:5em; margin-left:15em;">
    <form action="{{ route('testcases.update' , $testcase->id) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h4 class="card-header text-center"> Update Test Case</h3>
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

            <a href="{{ route('testcases.index') }}" class="btn btn-secondary mr-2"><i class="fa fa-arrow-left"></i>Back</a>

            <button type="submit" class="btn btn-info ">                
                <i class="fa fa-check"></i>
                Update</button>
        </div>
    </form>
</div>
    

{{-- <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: 'yy-mm-dd'
    });
</script> --}}
@endsection
