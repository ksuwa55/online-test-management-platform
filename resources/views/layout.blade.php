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
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg> --}}
                                <span class="ml-2">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  text-white" href="{{ route('requirements.index') }}">
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg> --}}
                                <span class="ml-2">Requirements</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  text-white" href="{{ route('testcases.index') }}">
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg> --}}
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
                                {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg> --}}
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
