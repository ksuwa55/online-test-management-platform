@extends('layout')

@section('main-content')

<div class="container mt-3">
    <div class="row">
        <a href="#" class="btn btn-info" style="max-width: 12rem;">
             <i class="fa fa-plus-circle"></i> Add Test Case
        </a>   
    </div>
    <br>
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