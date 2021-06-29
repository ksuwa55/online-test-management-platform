@extends('layout')

@section('main-content')

<div class="container mt-3">
    <div class="row">
        <a href="#" class="btn btn-info" style="max-width: 12rem;">
             <i class="fa fa-plus-circle"></i> Generate Report
        </a>       
    </div>
    <br>

    <div class="row">
        <div class="card text-white bg-warning mb-3 col-5" style="max-width: 20rem; height: 13rem;">
            <div class="card-body">
                <br>
                <h4 class="card-title">Acievement rate</h4>
                <p class="card-text">Achievement rates</p>
            </div>
        </div>
        <div class="col-2"></div>
        <div class="card text-white bg-danger mb-3 col-5" style="max-width: 20rem; height: 13rem;">
            <div class="card-body">
                <br>
                <h4 class="card-title">Finish Date</h4>
                <p class="card-text">Finish Date</p>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="card text-white bg-success mb-3 col-5" style="max-width: 20rem; height: 13rem;">
            <div class="card-body">
                <br>
                <h4 class="card-title">{{ $count_req }}</h4>
                <p class="card-text">Requirements</p>
            </div>
        </div>
        <div class="col-2"></div>
        <div class="card text-white bg-primary mb-3 col-5" style="max-width: 20rem; height: 13rem;">
            <div class="card-body">
                <br>
                <h4 class="card-title">{{ $count_testcase }}</h4>
                <p class="card-text">Test Cases</p>
            </div>
        </div>
    </div>
</div>

@endsection