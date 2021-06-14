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
                    <th scope="col">Test case</th>
                    <th scope="col">Test type</th>
                    <th scope="col">Requirements</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Test data</th>
                    <th scope="col">Evidence</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>Case-01</td>
                    <td>Acceptance</td>
                    <td>REQ-01</td>
                    <td>15 June 2021</td>
                    <td>25 June 2021</td>
                    <td>
                        <select name="status" id="status" class="form-control" >    
                            <option>In progress</option>
                            <option>Completed</option>
                        </select>
                    </td>
                    <td>data.xlsx</td>
                    <td>evidence.xlsx</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>    
</div>

@endsection