<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <meta http-equiv="Content-type" content="text/html; charset=utf-8">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

        <!--  jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        {{-- <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script> --}}

        <!-- Isolated Version of Bootstrap, not needed if your site already uses Bootstrap -->
        {{-- <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> --}}

        <!-- Bootstrap Date-Picker Plugin -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
        
        <!-- Full calendar -->
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />


        <style>
        

            .sidebar {
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 60px 0 0;
            z-index: 99;
            height:140vh;
            }
            
            @media (max-width: 767.98px) {
            .sidebar {
                top: 11.5rem;
                padding: 0;
            }
            }
        
            .logout{
                margin-left: 17px
            }
            .nav-link:hover{
                background-color: #72a7f7;
            }

            .notification mark{
                border-radius: 50%;
                color: white;
            }

            .notification .succeed{
                background-color: rgb(241, 144, 120);
            }

            .notification .failed{
                background-color: rgb(28, 170, 196);
            }
     
            </style>


    </head>
    <body class="antialiased">
        
        <!-- Sidebar -->
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebar" class="col-md-3 col-lg-2 bg-dark  sidebar">
                    <!-- contents -->
                    <div class="position-sticky ">
                        <ul class="nav flex-column ">
                            <li class="nav-item">
                                <a class="nav-link text-white" aria-current="page" href="{{ route('dashboard') }}">
                                <span class="ml-2">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  text-white" href="{{ route('requirements.index') }}">
                                <span class="ml-2">Requirements</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  text-white" href="{{ route('testcases.index') }}">
                                <span class="ml-2">Test Cases</span>
                                @if ($count_succeed_testcase)
                                    <span class="notification"><mark class="succeed swing">{{ $count_succeed_testcase }}</mark></span>
                                @endif
                                @if ($count_failed_testcase)
                                    <span class="notification"><mark class="failed swing">{{ $count_failed_testcase }}</mark></span>
                                @endif
                                </a>
                            </li>  
                            <li class="nav-item">
                                <a class="nav-link  text-white" href="{{ route('tasks.index') }}">
                                <span class="ml-2">Tasks</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <br><br><br><br><br><br>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-primary" style="margin-left: 1em;">Logout</button>
                    </form>                
                </nav>

                <!-- Body -->
                <div class="col">
                    @yield('main-content')
                </div>
            </div>
        </div>

                <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
   
    </body>
</html>
