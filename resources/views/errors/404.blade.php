@extends('layout')

@section('pageName', 'App_404')

@section('content')

    <div class="container text-center">

        @include('_errors')

        <h3 class="heading">404 - Page Not Found</h3>

        <p class="my-5 text-muted">{!! $exception->getMessage() ? $exception->getMessage() : 'The page you specified can not be found!' !!}</p>

        <p><a href="{{ url('/') }}">Home</a></p>

    </div>

@endsection