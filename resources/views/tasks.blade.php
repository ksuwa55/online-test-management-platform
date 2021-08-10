@extends('layout')

@section('main-content')
<div class="container mt-3">

    <!-- Modal - create -->
    <div class="row">
        @if ($user_role==='Administrator'||$user_role==='Manager')
            <a href="#" class="btn btn-info" style="max-width: 12rem;" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="fa fa-plus-circle"></i> Add Task
            </a>   
        @else
            <br><br>
        @endif

    </div>
    <br>

    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="card">
                    <form action="{{ route('tasks.store') }}" method="POST" autocomplete="off">
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

    
    <!-- Flash message -->
    @if (session('flash_message'))
        <script>alert('{{ session('flash_message') }}')</script>    
    @endif
    
    <!-- Task table -->
    <div class="row" style="min-height: 85vh">

        <div class="col-3 border border-dark" style="overflow-y: auto; max-height: 100vh;" >
            @foreach($tasks as $task)
            <div class="card" style="margin:7px 0;">
                <div class="card-header">
                    <a href="">                    
                        {{ $task->title }}               
                    </a>
                </div>
                <div class="card-body">
                    <p class="card-text">                            
                        @foreach ($all_users as $user)
                            @if ($task->person_email === $user->email )
                            Personne : {{ $user->name }}
                            @endif
                        @endforeach     
                    </p>
                    <p class="card-text" > {{ $task->start }}~{{$task->end}} </p>
                    @if ($user_role==='Administrator'||$user_role==='Manager')
                        <a href="{{ route('tasks.edit', $task->id)}}" class="btn btn-success btn-sm"  >
                            <i class="fa fa-edit"></i> 
                        </a>  
                        <form action="{{ route('tasks.destroy', $task->id) }}" style="display: inline" method='POST'>
                            @csrf
                            @method('DELETE')
        
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa fa-trash"></i> 
                            </button>  
                        </form>   
                    @else
                        <br>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <div class="col-9 border border-dark" style="overflow-y: auto; max-height: 100vh;">
            <div id='calendar'></div>
        </div>

        <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
        <script>
            $(document).ready(function() {
                // page is now ready, initialize the calendar...
                $('#calendar').fullCalendar({
                    // put your options and callbacks here
                    events : [
                        @foreach($tasks as $task)
                        {
                            title : '{{ $task->title }}',
                            start : '{{ $task->start }}',
                            end : '{{ $task->end }}',
                            url : '{{ route('tasks.edit', $task->id) }}',
                            @if ($task->person_email == $user_email)
                                    color: 'orange',
                            @endif
                        },
                        @endforeach
                    ]
                })
            });
        </script>
</div>

<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: 'yy-mm-dd'
    });
</script>
@endsection