@extends('layout')

@section('pageName', 'App_Posts')

@section('content')

    <div class="container">

        @include('_errors')

        @if($posts->count())

            <ul id="posts">
                @foreach($posts as $year => $values)
                    <h3 class="heading">{{ $year }}</h3>
                    @foreach($values as $post)
                        <li class="post">
                            <span>{{ $post->created_at->format('F j') }}</span>
                            <a href="{{ url('posts/' . $post->getIdentifier()) }}">{{ $post->subject }}</a>
                        </li>
                    @endforeach
                @endforeach
            </ul>

        @else
            <p class="text-muted text-center my-5 font-italic">No posts are here!</p>
        @endif

    </div>

@endsection