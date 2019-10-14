@extends('layout')

@section('pageName', 'Welcome')

@section('content')

    <div class="container">

        @include('_errors')

        <div class="about-container">
            {!! Markdown::convertToHtml(Setting::get('bio')) !!}
        </div>

    </div>

@endsection
