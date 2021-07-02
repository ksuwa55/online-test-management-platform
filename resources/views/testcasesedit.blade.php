@extends('layout')
    
@section('main-content')
    

<div class="card" style="width:50%; margin-top:5em; margin-left:15em;">
    <form action="{{ route('testcases.update' , $testcase->id) }}" method="POST" autocomplete="off">
        @csrf
        @method('PUT')
        <h4 class="card-header text-center"> Update Test Case</h3>
        <div class="card-body">
            <div class="form-group mb-3">
                <input type="text" placeholder="Title" id="title_edit" class="form-control" name="title"
                value="{{ $testcase->title }}"  required autofocus>
            </div>
            <div class="form-group mb-3">
                <input type="text" placeholder="Requirement Code" id="requirement_cd_edit" name="requirement_cd" class="date form-control" 
                value="{{ $testcase->requirement_cd }}"    required autofocus>
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
