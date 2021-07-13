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
        <div class="card text-white bg-warning col-5" style="max-width: 20rem; height: 8rem;">
            <div class="card-body">
                <br>
                <h4 class="card-title">{{ $achieving_rate }}</h4>
                <p class="card-text">Achievement rates</p>
            </div>
        </div>
        <div class="col-2"></div>
        <div class="card text-white bg-danger col-5" style="max-width: 20rem; height: 8rem;">
            <div class="card-body">
                <br>
                <h4 class="card-title">{{ $final_date }}</h4>
                <p class="card-text">Finish Date</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-2">
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <div id="donut_single" style="width: 500px; height: 500px;  "></div>
        </div>
    </div>
</div>

<script type="text/javascript">
  
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    const count_succeed_testcase = @json($count_succeed_testcase);
    const count_failed_testcase = @json($count_failed_testcase);
    const count_waiting_testcase = @json($count_waiting_testcase);
    const count_accepted_testcase = @json($count_accepted_testcase);

    var chart;
    var inputData = [['Effort', 'Amount given']];
    var sysData = [
        ['Succeed', count_succeed_testcase],
        ['Failed', count_failed_testcase],
        ['Waiting', count_waiting_testcase],
            ['Accepted', count_accepted_testcase]

    ];

    for(idx in sysData){
        inputData.push(sysData[idx]);
    }

    function drawChart() {

    var data = google.visualization.arrayToDataTable(inputData);

    var options = {
        legend: 'none',
        pieSliceText: 'label',
        pieSliceTextStyle: {
        color: 'white',
        },
        title: 'Test case statuses',
    };

    chart = new google.visualization.PieChart(document.getElementById('donut_single'));
    chart.draw(data, options);
    google.visualization.events.addListener(chart, 'select', selectHandler);

    }

    function selectHandler() {
        var selection = chart.getSelection();
    console.log(sysData[selection[0].row][0]);
    }


</script>


@endsection