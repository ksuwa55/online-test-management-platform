@extends('layout')

@section('main-content')

<div class="container mt-3">
    <div class="row">
        <button type="button" class="btn btn-primary" style="max-width: 10rem;">Generate Report</button>
    </div>
    <br>

    <div class="row">
        <div class="card text-white bg-warning mb-3 col-5" style="max-width: 20rem; height: 13rem;">
            <div class="card-body">
                <br>
                <h4 class="card-title">50%</h4>
                <p class="card-text">Achievement rates</p>
            </div>
        </div>
        <div class="col-2"></div>
        <div class="card text-white bg-danger mb-3 col-5" style="max-width: 20rem; height: 13rem;">
            <div class="card-body">
                <br>
                <h4 class="card-title">15</h4>
                <p class="card-text">Remaining Date</p>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="card text-white bg-success mb-3 col-5" style="max-width: 20rem; height: 13rem;">
            <div class="card-body">
                <br>
                <h4 class="card-title">100</h4>
                <p class="card-text">Requirements</p>
            </div>
        </div>
        <div class="col-2"></div>
        <div class="card text-white bg-info mb-3 col-5" style="max-width: 20rem; height: 13rem;">
            <div class="card-body">
                <br>
                <h4 class="card-title">100</h4>
                <p class="card-text">Test Cases</p>
            </div>
        </div>
    </div>
</div>

@endsection