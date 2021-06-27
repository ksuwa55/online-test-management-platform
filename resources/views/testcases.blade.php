@extends('layout')

@section('main-content')

<div class="container mt-3">

    <!-- Modal (Pop up of requirements) -->
    <div class="row">
        <a href="#" class="btn btn-info" style="max-width: 12rem;" data-bs-toggle="modal" data-bs-target="#exampleModal">
             <i class="fa fa-plus-circle"></i> Add Test Case
        </a>   
    </div>
    <br>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card">
                    <form action="{{ route('requirements.store') }}" method="POST">
                        @csrf
                        <h4 class="card-header text-center">Add Test Case</h3>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Test Case Code" id="requirement_cd" class="form-control" name="requirement_cd"
                                    required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Title" id="title" class="form-control" name="title"
                                    required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Requirements" id="requirements" class="form-control" name="requirements"
                                    required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Test Data" id="testdata" class="form-control" name="testdata"
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
        <!-- Test Case List -->
        <div class="col border border-dark" style="overflow-y: auto; max-height: 85vh;">
            <table class="table table-striped" style="margin-top:7px;">
                <thead>
                    <tr>
                    <th scope="col">Code</th>
                    <th scope="col">Title</th>
                    <th scope="col">Requirements</th>
                    <th scope="col">Test data</th>
                    <th scope="col">Evidence</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($testcases as $testcase)                        
                    <tr>
                    <td>{{ $testcase->testcase_cd }}</td>
                    <td>{{ $testcase->title }}</td>
                    <td>{{ $testcase->requirement_cd }}</td>
                    <td>{{ $testcase->testdata }}</td>
                    <td>{{ $testcase->evidence }}</td>
                    <td>{{ $testcase->status }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>    
</div>

@endsection