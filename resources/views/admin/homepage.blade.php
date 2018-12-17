@extends('layout')

@section('pageName', 'App_Admin')

@section('content')

    <div class="container">

        @include('_errors')

        <h3 class="heading">
            Admin
            <a href="{{ url('logout') }}">Logout</a>
        </h3>

        <ul class="list-unstyled mb-5">
            <li>
                <a href="{{ url('admin/posts') }}">Posts</a>
            </li>
        </ul>

        <form action="{{ url('admin/settings') }}" id="settings" method="post">
            @csrf

            <div class="form-group row">
                <div class="col-md-12">
                    <div class="input-group">
                        <textarea class="form-control autosize" name="settings" placeholder="Global Settings (JSON formatted)" rows="4">{{ Setting::get('global', '') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">Save Global Settings</button>
                </div>
            </div>
        </form>

    </div>

@endsection