@extends('layouts.app')
<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link href="{{ asset('css/calendar.css') }}" rel="stylesheet">


<script src='https://cdn.jsdelivr.net/npm/rrule@2.6.4/dist/es5/rrule.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.2.0/main.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/@fullcalendar/rrule@5.2.0/main.global.min.js'></script>



</head>
@section('content')
<body>
    <calendar-component  :urldata="{{json_encode($events)}}" :num="{{json_encode($idUser)}}"></calendar-component>
</body>

@endsection
</html>

