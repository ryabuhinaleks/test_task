@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">        
        <div id="app">
            <account-component :urldata="{{json_encode($user)}}"></account-component>
        </div>
        </div>
    </div>
</div>
@endsection
