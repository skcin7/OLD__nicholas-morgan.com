@extends('layout')

@section('pageName', 'App_Homepage')

@section('content')

    <div class="container">

        @include('_errors')

        <div class="about-container">
            <p class="mt-3">I'm a Full Stack Web and API developer with over 8 years of industry experience in crafting highly usable fully scalable interactive web applications.</p>

            <p>I am based in Los Angeles, CA. I work in <a class="hover-up" href="https://laravel.com" target="_blank">Laravel - The PHP Framework for Web Artisans</a> because I like things that are good, and use a test-driven (TDD) development approach.</p>

            <p>My experience covers server configuration, database administration, HTML5 and front-end development (including SCSS and various JavaScript frameworks), SSH key configuration and basic security, Git version control system, working in team based agile/scrum environments, business development, search engine optimization, OAuth2 implementation, API development and implementation, and probably more. TL;DR: I'm valuable, bitch!</p>

            <p>I use Bitbucket now to host my projects (free private repositories!), but <a class="hover-up" href="https://github.com/skcin7" target="_blank">here's my public Github</a>.</p>
        </div>

    </div>

@endsection