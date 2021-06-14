@extends('layout')

@section('main-content')

<div class="container mt-3">
    <div class="row">
        <a href="#" class="btn btn-info" style="max-width: 12rem;">
             <i class="fa fa-plus-circle"></i> Add Requirement
        </a>   
    </div>
    <br>
    <div class="row" style="min-height: 85vh">
        <!-- Requirements List -->
        <div class="col-2 border border-dark" style="overflow-y: auto; max-height: 85vh;" >
            <div class="card" style="margin: 7px 0;">
                <div class="card-header">
                    REQ-01                
                </div>
                <div class="card-body">
                    <p class="card-text" >Title</p>
                </div>
            </div>
            <div class="card" style="margin: 7px 0;">
                <div class="card-header">
                    REQ-02               
                </div>
                <div class="card-body">
                    <p class="card-text" >Title</p>
                </div>
            </div>
        </div>
        <div class="col-1"></div>

        <!-- Test Case List -->
        <div class="col-9 border border-dark" style="overflow-y: auto; max-height: 85vh;">
            <div class="float-start mt-3">
                <h4 class="pb-3">REQ-01</h4>
            </div>
            <div class="float-end mt-3">
                <a href="#" class="btn btn-info">
                    <i class="fa fa-plus-circle"></i> Add Test Case
                </a>    
            </div>
            <table class="table table-striped" style="margin-top:7px;">
                <thead>
                    <tr>
                    <th scope="col">Test case</th>
                    <th scope="col">Test data</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>Case-01</td>
                    <td>data.xlsx</td>
                    <td>15 June 2021</td>
                    <td>25 June 2021</td>
                    <td>
                        <select name="status" id="status" class="form-control" >    
                            <option>In progress</option>
                            <option>Completed</option>
                        </select>
                    </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>    
</div>

@endsection