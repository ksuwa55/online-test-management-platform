@extends('layout')
    
@section('main-content')
    
<!-- Modal - edit -->
{{-- <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content"> --}}
            <div class="card" style="width:50%; margin-top:5em; margin-left:15em;">
                <form action="{{ route('tasks.update' , $task->id) }}" method="POST" autocomplete="off">
                    @csrf
                    @method('PUT')
                    <h4 class="card-header text-center">Edit Task</h3>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Title" id="title_edit" class="form-control" name="title"
                            value="{{ $task->title }}"  required autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Start" id="start_edit" name="start" class="date form-control" 
                            value="{{ $task->start }}"    required autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" placeholder="End" id="end_edit" name="end" class="date form-control" 
                            value="{{ $task->end }}"    required autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <input type="text" placeholder="Person Email" id="person_email_edit" class="form-control" name="person_email"
                            value="{{ $task->person_email }}"    required autofocus>
                        </div>

                        <div >
                            <button type="submit" class="btn btn-info btn-sm">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        {{-- </div>
    </div>
</div> --}}

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
<script>
    $('.date').datepicker({
        autoclose: true,
        dateFormat: 'yy-mm-dd'
    });
</script>
@endsection
