@extends('layout')

@section('main-content')

<div class="container mt-3">

    <!-- Modal (Pop up of testcase) -->
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
                    <form action="{{ route('testcases.store') }}" method="POST">
                        @csrf
                        <h4 class="card-header text-center">Add Test Case</h3>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Test Case Code" id="testcase_cd" class="form-control" name="testcase_cd"
                                    required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Title" id="title" class="form-control" name="title"
                                    required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Requirements" id="requirement_cd" class="form-control" name="requirement_cd"
                                    required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Test Data" id="testdata" class="form-control" name="testdata"
                                    required autofocus>
                            </div>
                            
                            <!-- file upload -->
                            <form method="POST" action="/upload" enctype="multipart/form-data">
                                @csrf
                                <input type="file" id="file" name="file" class="form-control">
                                <button type="submit">upload</button>
                            </form>

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
                        <th scope="col"></th>
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
                        <td>
                            <form action="{{ route('testcases.update', $testcase->id) }}"  method='POST'>
                                @csrf
                                @method('PUT')

                                <div style="display: flex; flex-direction:column; max-width:7rem;">
                                    <select name="status" id="status" >
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status['value'] }}"  {{ $testcase->status === $status['value'] ? 'selected' : '' }} >{{ $status['label'] }}</option>
                                        @endforeach
                                    </select>
                                    
                                    <button  onclick="alert('Status has been changed')" type="submit" class="btn btn-info btn-sm" style="max-width: 12rem; margin-top:0.5rem;">
                                        <i class="fa fa-plus-circle"></i> change
                                    </button>   
                                </div>
                           </form>
                        </td>
                        <td>
                            <div class="float-midle">
                                <a href="{{ route('testcases.edit', $testcase->id) }}" class="btn btn-success"  >
                                    <i class="fa fa-edit"></i> 
                                </a>  


                                <form action="{{ route('testcases.destroy', $testcase->id) }}" style="display: inline" method='POST'>
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">
                                        <i class="fa fa-trash"></i> 
                                    </button>  
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>    
</div>

@endsection