<!DOCTYPE html>

<html lang="en" id="@yield('pageName')">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>{{ (env('APP_ENV') === "local" ? "[Dev] " : "") . (isset($title_prefix) ? $title_prefix . ' • ' : '') }}Nick Morgan</title>

    <link href="{{ url('css/app.css?random=' . rand(1,99999)) }}" rel="stylesheet" type="text/css">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ url('favicon/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ url('favicon/apple-icon-60x60.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ url('favicon/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('favicon/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ url('favicon/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ url('favicon/apple-icon-120x120.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ url('favicon/apple-icon-144x144.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ url('favicon/apple-icon-152x152.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('favicon/apple-icon-180x180.png') }}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ url('favicon/android-icon-192x192.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ url('favicon/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('favicon/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ url('favicon/ms-icon-144x144.png') }}">
    <meta name="theme-color" content="#ffffff">

    {{--<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Roboto+Slab' rel='stylesheet' type='text/css'>--}}

    <meta name="title" content="Nick Morgan">
    <meta name="author" content="Nick Morgan">
    <meta name="description" content="Welcome to the personal website of Nick Morgan.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<body>
<header>
    <div id="logo">
        <a href="{{ url('/') }}"><img src="{{ url('images/logo-circle-invert.png') }}" width="50"></a>
    </div>

    <div id="menu">
        <a class="menu-item" href="{{ url('/') }}">Home</a>
        @if(isset($settings->show_posts) && $settings->show_posts)
            <a class="menu-item" href="{{ url('posts') }}">Posts</a>
        @endif
        <a class="menu-item ml-auto" href="{{ url('admin') }}">{{ Auth::check() ? Auth::user()->name : 'Admin' }}</a>
    </div>

    <div id="hero">
        <h1>{{ isset($title_prefix) ? $title_prefix . ' • ' : '' }}Nick Morgan</h1>
    </div>
</header>
<section id="@yield('section_id')">
    @yield('content')
</section>
<footer>
    <div class="container">
        <div class="my-0">
            © {{ date('Y') }} <a href="mailto:nick@nicholas-morgan.com">Nick Morgan</a>. All Rights Reserved. <em>ALL</em> of them.
            <a href="http://instagram.com/skcin7" target="_blank"><i class="icon-instagram"></i></a>
            <a href="http://github.com/skcin7" target="_blank"><i class="icon-git"></i></a>
        </div>
    </div>
</footer>
<script src="{{ url('js/app.js?random=' . rand(1,10000)) }}"></script>
<script type="text/javascript">
    window.App.init({
        appData: {
            url: '{{ (request()->secure() ? 'https://' : 'http://') . getenv('APP_NAME') . '.' . getenv('APP_TLD') }}',
            email: '{{ getenv('APP_EMAIL') }}'
        },
        modules: [
            {
                name: 'App_Admin'
            },
            {
                name: 'App_Homepage'
            }
        ]
    });
    @yield('additionalJs')
</script>

{{-- Google Analytics: --}}
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-33079246-5', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>