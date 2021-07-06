@extends('layout')
    
@section('main-content')
    
<div class="card" style="width:50%; margin-top:5em; margin-left:15em;">
    <form action="{{ route('requirements.update' , $requirement->id) }}" method="POST" autocomplete="off" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <h4 class="card-header text-center"> Update Requirement</h3>
        <div class="card-body">
            <!-- title -->
            <div class="form-group mb-3">
                <input type="text" placeholder="Title" id="title_edit" class="form-control" name="title"
                value="{{ $requirement->title }}"  required autofocus>
            </div>
            <!-- description -->
            <div class="form-group mb-3">
                <input type="text" placeholder="Description" id="description_edit" class="form-control" name="description"
                value="{{ $requirement->description }}"  required autofocus>
            </div>

            <a href="{{ route('requirements.index') }}" class="btn btn-secondary mr-2"><i class="fa fa-arrow-left"></i>Back</a>

            <button type="submit" class="btn btn-info ">                
                <i class="fa fa-check"></i>
                Update</button>
        </div>
    </form>
</div>
    
@endsection
