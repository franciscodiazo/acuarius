@extends('layouts.app')

@section('title', 'suscriptor')


@section('content')  
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">{{ $suscriptor->matricula }}

        </div>	
    </div>
</div>
@endsection