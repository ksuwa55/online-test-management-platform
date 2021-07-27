<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">


</head>

<body>
    
    <div class="container mt-3">

        <div class="border border-dark" style="border-style: solid; max-height: 85vh;">
            <p style="padding: 5px;">{{ $comment }}</p>
        </div>
        <br>

        <p>Achievement rate</p>
        <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: {{ $achieving_rate }}%;">
                {{ $achieving_rate }}
            </div>
        </div> 

        <br>
        <table class="table table-striped" style="margin-top:7px;">
            <thead>
                <tr>
                    <th scope="col">Final Date</th>
                    <th scope="col">Waiting Test Case</th>
                    <th scope="col">Succeed Test Case</th>
                    <th scope="col">Failed Test Case</th>
                    <th scope="col">Accepted Test Case</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="col">{{ $final_date }}</td>
                    <td scope="col">{{ $count_waiting_testcase }}</td>
                    <td scope="col">{{ $count_succeed_testcase }}</td>
                    <td scope="col">{{ $count_failed_testcase }}</td>
                    <td scope="col">{{ $count_accepted_testcase }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
