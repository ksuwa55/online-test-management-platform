@extends('layout')

@section('main-content')

<div class="container mt-3">

    <!-- model -->
    <div class="row">
        @if ($user_role==='Administrator'||$user_role==='Manager')
            <a href="{{ URL::to('/dashboard/pdf') }}" class="btn btn-info" style="max-width: 12rem;" >
                <i class="fa fa-plus-circle"></i> Generate Report
            </a>     
        @else
        <br>
        @endif
    </div>
    <br>

    {{-- data-bs-toggle="modal" data-bs-target="#reportModal"  --}}
    {{-- <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <h4 class="card-header text-center">Generate a report</h3>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label class="container">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                    Status of case
                                </label>
                            </div>
                            <div class="form-group mb-3">
                                <label class="container">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                    Achieve rate
                                </label>
                            </div>
                            <div class="form-group mb-3">
                                <label class="container">
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                    Remaining date
                                </label>
                            </div>
                            <div >
                                <button type="submit" class="btn btn-info btn-sm">Generate</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 --}}


    <div class="row">
        <div class="card text-white bg-warning mb-3 col-5" style="max-width: 20rem; height: 13rem;">
            <div class="card-body">
                <br>
                <h4 class="card-title">{{ $achieving_rate }}</h4>
                <p class="card-text">Achievement rates</p>
            </div>
        </div>
        <div class="col-2"></div>
        <div class="card text-white bg-danger mb-3 col-5" style="max-width: 20rem; height: 13rem;">
            <div class="card-body">
                <br>
                <h4 class="card-title">{{ $final_date }}</h4>
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