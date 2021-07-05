@extends('layout')

@section('main-content')

<div class="container mt-3">

    <!-- Modal (Pop up of requirements) -->
    <div class="row">
        <a href="#" class="btn btn-info" style="max-width: 12rem;" data-bs-toggle="modal" data-bs-target="#exampleModal">
             <i class="fa fa-plus-circle"></i> Add Requirement
        </a>   
    </div>
    <br>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card">
                    <form action="{{ route('requirements.store') }}" method="POST">
                        @csrf
                        <h4 class="card-header text-center">Add Requirement</h3>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Requirement Code" id="requirement_cd" class="form-control" name="requirement_cd"
                                    required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Title" id="title" class="form-control" name="title"
                                    required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Description" id="description" class="form-control" name="description"
                                    required autofocus>
                            </div>

                            <div >
                                <button type="submit" class="btn btn-info btn-sm">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="min-height: 85vh">

        <!-- Requirements List -->
        <div class="col-2 border border-dark" style="overflow-y: auto; max-height: 85vh;" >
            @foreach($requirements as $requirement)
            <a href="{{ route('requirements.display', $requirement->id) }}" class="card" style="margin: 7px 0;">
                <div class="card-header">
                    {{ $requirement->requirement_cd }}               
                </div>
                <div class="card-body float-midle" >
                    <p class="card-text" > {{ $requirement->title }} </p>
                    <form action="{{ route('requirements.destroy', $requirement->id) }}" style="display: inline" method='POST'>
                        @csrf
                        @method('DELETE')
    
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i> 
                        </button>  
                    </form>
                </div>

            </a>
            @endforeach
        </div>
        <div class="col-1"></div>

        <!-- Test Case List -->
        <div class="col-9 border border-dark" style="overflow-y: auto; max-height: 85vh;">
            @include('testcase_in_requirements')
        </div>
    </div>    
</div>

@endsection