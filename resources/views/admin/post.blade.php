@extends('layout')

@section('pageName', 'App_AdminPosts')

@section('content')

    <div class="container">

        @include('_errors')

        <ol class="breadcrumb my-3">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}"><i class="icon-home"></i> Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ url('admin/posts') }}">Posts</a></li>
            <li class="breadcrumb-item">{!! $post->exists ? '[<code>' . $post->id . '</code>] ' . $post->subject : 'Add Post' !!}</li>
        </ol>

        <form action="{{ url($post->exists ? 'admin/posts/' . $post->id : 'admin/posts/add') }}" method="post">
            @csrf

            <div class="form-group row">
                <div class="col-md-12">
                    <input class="form-control" name="subject" placeholder="Subject" type="text" value="{{ $post->exists ? old('subject') ? old('subject') : $post->subject : old('subject') }}" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <div class="input-group">
                        <textarea class="form-control autosize" name="body" placeholder="Body" rows="4">{{ $post->exists ? old('body') ? old('body') : $post->body : old('body') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="published" {{ $post->exists && $post->published ? 'checked' : old('published') ? 'checked' : '' }}> Published
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">{{ $post->exists ? 'Save' : 'Add' }} Post</button>
                    @if($post->exists)
                        <button class="btn btn-danger" name="delete" type="submit" value="1" onclick="if(! confirm('Really delete this post?')) { return false; }">Delete</button>
                    @endif
                </div>
            </div>
        </form>

    </div>

@endsection