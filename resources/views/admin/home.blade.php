@extends('layout')

@section('pageName', 'Admin_Home')

@section('content')

    <div class="container">

        @include('_errors')

        <ol class="breadcrumb">
            <li class="breadcrumb-item">Admin</li>
        </ol>

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
                        <textarea class="form-control autosize" name="settings" placeholder="Global Settings (JSON formatted)" rows="4">{{ old('settings') ? old('settings') : Storage::get('settings.json') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">Save Settings</button>
                </div>
            </div>
        </form>

    </div>

@endsection
