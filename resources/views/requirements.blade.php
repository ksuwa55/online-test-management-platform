@extends('layout')

@section('main-content')

<div class="container mt-3">

    <!-- Modal (Pop up of requirements) -->
    <div class="row">

        @if ($user_role==='Administrator')
            <a href="#" class="btn btn-info" style="max-width: 12rem;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa fa-plus-circle"></i> Add Requirement
            </a>   
        @else
        <br>
        @endif

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
                                <textarea type="text"  placeholder="Description" class="form-control" id="description" name="description" rows="5"></textarea>
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

        <!-- Flash message -->
    @if (session('flash_message'))
        <script>alert('{{ session('flash_message') }}')</script>    
    @endif
    
    <div class="row" style="min-height: 85vh">

        <!-- Requirements List -->
        <div class="col-3 border border-dark" style="overflow-y: auto; max-height: 85vh;" >
            @foreach($requirements as $requirement)
            <div class="card" style="margin:7px 0;">
                <div class="card-header">
                    <a href="{{ route('requirements.display', $requirement->id) }}">                    
                        {{ $requirement->requirement_cd }}               
                    </a>
                </div>
                <div class="card-body">
                    <p class="card-text" > {{ $requirement->title }} </p>
                    @if ($user_role==='Administrator')
                        <a href="{{ route('requirements.edit', $requirement->id) }}" class="btn btn-success btn-sm"  >
                            <i class="fa fa-edit"></i> 
                        </a>  
                        <form action="{{ route('requirements.destroy', $requirement->id) }}" style="display: inline" method='POST'>
                            @csrf
                            @method('DELETE')
        
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i> 
                            </button>  
                        </form>   
                    @else
                        <br>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        {{-- <div class="col-1"></div> --}}

        <!-- Test Case List -->
        <div class="col-9 border border-dark" style="overflow-y: auto; max-height: 85vh;">
            @include('testcase_in_requirements')
        </div>
    </div>    
</div>

@endsection