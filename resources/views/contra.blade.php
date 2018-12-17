@extends('layout')

@section('pageName', 'App_Contra')

@section('content')

    <div class="container">

        @include('_errors')

        <h3 class="heading">{{ $post->subject }}</h3>

        <div class="body">
            {!! Markdown::convertToHtml( $post->body ) !!}
        </div>

    </div>

@endsection