@extends('layout')

@section('main-content')
<div class="container mt-3">

    <!-- Modal -->
    <div class="row">
        <a href="#" class="btn btn-info" style="max-width: 12rem;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa fa-plus-circle"></i> Add Task
        </a>   
    </div>
    <br>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card">
                    <form action="{{ route('tasks.store') }}" method="POST">
                        @csrf
                        <h4 class="card-header text-center">Add Task</h3>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Title" id="title" class="form-control" name="title"
                                    required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Start" id="start" name="start" class="date form-control" 
                                    required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="End" id="end" name="end" class="date form-control" 
                                    required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Person Email" id="person_email" class="form-control" name="person_email"
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
        <div class="col border border-dark" style="overflow-y: auto; max-height: 100vh;">
            <table class="table table-striped" style="margin-top:7px;">
                <thead>
                    <tr>
                    <th scope="col">Task</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">End Date</th>
                    <th scope="col">Person</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                    <tr>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->start }}</td>
                    <td>{{ $task->end }}</td>
                    <td>{{ $task->person_email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: 'yy-mm-dd'
    });
</script>

@endsection