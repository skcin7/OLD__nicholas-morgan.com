<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>{{ (! App::environment(['production']) ? "[" . ucfirst(App::environment()) . "] " : "") . (isset($title_prefix) ? $title_prefix . ' • ' : '') }}Nick Morgan</title>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css"/>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ url('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ url('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ url('favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ url('favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#1e0201">

    <meta name="title" content="Nick Morgan"/>
    <meta name="author" content="Nick Morgan"/>
    <meta name="description" content="The personal website of Nick Morgan."/>
    <meta name="twitter:site" content="@skcin7"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
</head>
<body>
    <header>
        <div id="avatar">
            <a href="{{ url('/') }}"><img src="{{ url('images/avatar.jpg') }}"></a>
        </div>

        <div id="menu">
            <a class="menu-item" href="{{ url('/') }}">Home</a>
            @if(isset($settings->show_posts) && $settings->show_posts)
                <a class="menu-item" href="{{ url('posts') }}">Posts</a>
            @endif

            @if(Setting::get('show_projects'))
                <a class="menu-item" href="{{ url('projects') }}">Projects</a>
            @endif

            @if(Setting::get('show_skills'))
                <a class="menu-item" href="{{ url('skills') }}">Skills</a>
            @endif

            @if(Auth::check())
                <a class="menu-item ml-auto" href="{{ url('admin') }}">Admin</a>
                <a class="menu-item" href="{{ url('logout') }}">Logout</a>
            @else
                <a class="menu-item ml-auto" href="{{ url('login') }}">Login</a>
            @endif
        </div>

        <div id="hero">
            <h1>{{ isset($page_title) ? $page_title : 'Nick Morgan' }}</h1>
        </div>
    </header>
    <main id="page-content" name="@yield('pageName')">
        @yield('content')
    </main>
    <footer>
        <div class="container">
            <div class="my-0">
                <i class="icon-copyright"></i> {{ date('Y') }} <a href="mailto:nick@nicholas-morgan.com">Nick Morgan</a>. All Rights Reserved. <a href="https://paste.nicholas-morgan.com">Paste</a>
                <a href="http://instagram.com/skcin7" target="_blank"><i class="icon-instagram"></i></a>
                <a href="http://github.com/skcin7" target="_blank"><i class="icon-github"></i></a>
            </div>
        </div>
    </footer>
<script src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript">
    window.NicholasMorgan.init({
        appData: {
            appUrl: '{{ env('APP_URL') }}',
            loggedInUser: {!! Auth::check() ? '{ name: \'' . Auth::user()->name . '\', id: ' . Auth::user()->id . ', }' : 'null' !!},
        },
        modules: [
            {
                name: 'Admin_Home'
            },
            {
                name: 'Welcome'
            }
        ]
    });
</script>
</body>
</html>
