@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">        
        <div id="app">
            <information-component :urldata="{{json_encode($dataUser)}}"></information-component>
        </div>
        </div>
    </div>
</div>
@endsection
