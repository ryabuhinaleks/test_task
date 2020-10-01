@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">               
           <update-component  :urldata="{{json_encode($dataEvent)}}"></update-component>              
        </div>
    </div>
</div>
@endsection
