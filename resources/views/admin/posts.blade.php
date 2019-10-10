@extends('layout')

@section('pageName', 'Admin_Posts')

@section('content')

    <div class="container">

        @include('_errors')

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}"><i class="icon-home"></i> Admin</a></li>
            <li class="breadcrumb-item">Posts</li>
        </ol>

        @if($posts->count())
            <div class="table-responsive">
                <table class="table table-hover table-border">
                    <thead class="thead-dark">
                    <tr>
                        <th>Date</th>
                        <th>Title</th>
                        <th class="text-right"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                {{ $post->created_at->format('n/j/Y') }}
                            </td>
                            <td>
                                <a href="{{ url('admin/posts/' . $post->id) }}">{{ $post->title }}</a>
                            </td>
                            <td class="text-right">
                                <a class="btn btn-primary" href="{{ url('admin/posts/' . $post->id) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>No posts.</p>
        @endif

        <a class="btn btn-primary" href="{{ url('admin/posts/add') }}">Add Post</a>

    </div>

@endsection
