

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    </head>

<body>
    <main class="signup-form" style="margin-top:1.5rem;">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div class="col-md-6">                
                    <div class="card">
                        <h4 class="card-header text-center">Project</h3>

                        <div class="card-body">
                            <form action="{{ route('register_project.store') }}" method="POST">
                                {{ csrf_field() }}
                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Project Name" id="project_name" class="form-control" name="project_name"
                                            required autofocus>
                                    </div>

                                    <div class="form-group mb-3">
                                        <input type="text" placeholder="Project Code" id="project_cd" class="form-control"
                                            name="project_cd" required autofocus>
                                    </div>

                                    <div class="d-grid mx-auto">
                                        <button type="submit" class="btn btn-dark btn-block">Register Project</button>
                                    </div>
                            </form>
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}"  style="margin-left:10px;">
                                    {{ __('Will you register user?') }}
                                </a>
                    
                                <a href="{{ route('register') }}" class="btn btn-xs btn-dark btn-sm pull-right col" style="margin-left:6px;">Register User</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </main>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
 