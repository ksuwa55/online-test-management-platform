<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">


</head>

<body>
    
    <div class="container mt-3">
            <p>Achieving rate</p>
            <div class="progress">
                <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $achieving_rate }}%;">
                    {{ $achieving_rate }}
                </div>
            </div> 

        <br>

            <div class="card  bg-danger mb-3 " style="max-width: 20rem; height: 13rem;">
                <div class="card-body">
                    <br>
                    <h4 class="card-title" style="padding-left: 10px;">{{ $count_succeed_testcase }}</h4>
                    <p class="card-text" style="padding-left: 10px;">Succeed Test Case</p>
                </div>
            </div>
            <div class="card  bg-info mb-3" style="max-width: 20rem; height: 13rem;">
                <div class="card-body">
                    <br>
                    <h4 class="card-title" style="padding-left: 10px;">{{ $count_failed_testcase }}</h4>
                    <p class="card-text" style="padding-left: 10px;">Failed Test Case</p>
                </div>
            </div>
            
            <br>
            <p class="card-text">Finish Date is {{ $final_date }}</p>
       
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
