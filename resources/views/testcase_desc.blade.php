@extends('layout')
    
@section('main-content')

<div class="card" style="width:50%; margin-top:5em; margin-left:15em;">

    <h4 class="card-header text-center"> {{ $testcase->testcase_cd }}: {{$testcase->title}}</h3>

    <div class="card-body">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <h6>Description</h6>
                <p>{{ $testcase->description }}</p>
            </li>
            <li class="list-group-item">
                <h6>Bug detail</h6>
                <p>{{ $testcase->bug_comment }}</p>
            </li>
        </ul>

        <a href="{{ route('testcases.index') }}" class="btn btn-secondary mr-2"><i class="fa fa-arrow-left"></i>Back</a>
    </div>


</div>

@endsection
