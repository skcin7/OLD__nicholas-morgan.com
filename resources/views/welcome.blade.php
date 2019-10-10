@extends('layout')

@section('pageName', 'Welcome')

@section('content')

    <div class="container">

        @include('_errors')

        <div class="about-container">
            <p class="mt-3">I'm a Full Stack Web and API developer with over 10 years of industry experience in crafting highly usable fully scalable interactive web applications.</p>

            <p>I am based in Los Angeles, CA. I typically work in <a class="hover-up" href="https://laravel.com" target="_blank">Laravel - The PHP Framework for Web Artisans</a>, and use a test-driven (TDD) development approach to ensure things don't break. I enjoy crafting highly-useful, scalable web applications, including APIs implementing OAuth2 for authentication. I'm fluent in all aspects of the software stack, including front-end UI/UX design (Bootstrap, SCSS, jQuery, React, Vue), SQL queries and schema design, cloud asset management using AWS, and I work and communicate well with others in an agile environment.</p>

            <p>I use Bitbucket now (free private repositories!), but here's my public <a class="hover-up" href="https://github.com/skcin7" target="_blank">GitHub</a>.</p>
        </div>

    </div>

@endsection
