@extends('layout')

@section('pageName', 'Post')

@section('content')

    <div class="container">

        @include('_errors')

        <h1 class="mt-3">{{ $post->subject }}</h1>

        <div class="body">
            {!! Markdown::convertToHtml( $post->body ) !!}
        </div>

    </div>

@endsection