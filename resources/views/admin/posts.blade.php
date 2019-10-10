@extends('layout')

@section('pageName', 'Admin_Posts')

@section('content')

    <div class="container">

        @include('_errors')

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}"><i class="icon-home"></i> Admin</a></li>
            <li class="breadcrumb-item">Posts</li>
        </ol>

        <h1>Posts</h1>

        <ul class="list-unstyled">
            @foreach(App\Post::orderBy('created_at', 'desc')->get() as $post)
                <li>
                    {{ $post->created_at->format('n/j/Y') }} -
                    <a href="{{ url('admin/posts/' . $post->id) }}">{{ $post->subject }}</a>
                </li>
            @endforeach
        </ul>

        <a class="btn btn-primary" href="{{ url('admin/posts/add') }}">Add Post</a>

    </div>

@endsection
