@extends('layout')

@section('pageName', 'Posts')

@section('content')

    <div class="container">

        @include('_errors')

        @if($posts->count())

            <ul id="posts">
                @foreach($posts as $year => $year_posts)
                    <h1>{{ $year }}</h1>
                    @foreach($year_posts as $post)
                        <li class="post">
                            <span>{{ $post->created_at->format('F j') }}</span>
                            <a href="{{ url('posts/' . $post->slug()) }}">{{ $post->title }}</a>
                        </li>
                    @endforeach
                @endforeach
            </ul>

        @else
            <p class="text-muted text-center my-5 font-italic">No posts are here!</p>
        @endif

    </div>

@endsection
