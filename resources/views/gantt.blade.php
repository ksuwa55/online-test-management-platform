

<!-- <head> -->
   
 
    <!-- <style type="text/css">
        html, body{
            height:100%;
            padding:0px;
            margin:0px;
            overflow: hidden;
        }

    </style> -->
<!-- </head>
<body> -->
@extends('layout')
@section('main-content')

<div id="gantt_here" style='width:99.9%; height:100%;  margin-left: auto; '></div>
<script type="text/javascript">
    gantt.config.date_format = "%Y-%m-%d %H:%i:%s";
 
    gantt.init("gantt_here");
  
    gantt.load("/api/data");
</script>
<!-- </body> -->
@endsection
