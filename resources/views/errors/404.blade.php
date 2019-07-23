@extends('layout')

@section('pageName', '404')

@section('content')

    <div class="container">

        @include('_errors')

        <h1 class="mt-3">404 - Page Not Found</h1>

        <p>{!! $ex->getMessage() ? $ex->getMessage() : 'The page you specified can not be found!' !!}</p>

        <p><a href="{{ url('/') }}">« Homepage</a></p>

    </div>

@endsection