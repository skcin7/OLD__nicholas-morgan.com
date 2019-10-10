@extends('layout')

@section('pageName', 'Post')

@section('content')

    <div class="container">

        @include('_errors')

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('posts') }}"><i class="icon-home"></i> Posts</a></li>
            <li class="breadcrumb-item">{{ $post->subject }}</li>
        </ol>

        <h1>{{ $post->subject }}</h1>

        <div class="body">
            {!! Markdown::convertToHtml( $post->body ) !!}
        </div>

    </div>

@endsection
