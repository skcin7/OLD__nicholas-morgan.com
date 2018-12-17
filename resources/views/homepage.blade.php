@extends('layout')

@section('pageName', 'App_Homepage')

@section('content')

    <div class="container">

        @include('_errors')

        <div class="about-container">
            <p class="mt-3">I'm a Full Stack Web and API developer with over 8 years of industry experience in crafting highly usable fully scalable interactive web applications.</p>

            <p>I am based in Los Angeles, CA. I work in <a class="hover-up" href="https://laravel.com" target="_blank">Laravel - The PHP Framework for Web Artisans</a> because I like things that are good, and use a test-driven (TDD) development approach.</p>

            <p>My experience covers Server Configuration, Database Administration, HTML5, Security, git Version Control System, Agile/Scrum, Business Development, Search Engine Optimization, OAuth2 implementation, and probably more.</p>

            <p><a class="hover-up" href="https://github.com/skcin7" target="_blank">Github</a></p>
        </div>

    </div>

@endsection