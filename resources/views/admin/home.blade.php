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
                <a href="{{ url('admin/misc') }}">Misc</a>
            </li>
            <li>
                <a href="{{ url('admin/posts') }}">Posts</a>
            </li>
            <li>
                <a href="{{ url('admin/projects') }}">Projects</a>
            </li>
        </ul>

        <h3>Global Settings:</h3>

        <form action="{{ url('admin/settings') }}" method="post">
            @csrf

            <div class="form-group row">
                <div class="col-md-12">
                    <div class="input-group">
                        <textarea class="form-control autosize" name="settings" placeholder="Settings (JSON Format)" rows="4">{{ old('settings') ? old('settings') : Storage::get('settings.json') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit"><i class="icon-floppy"></i> Save Settings</button>
                </div>
            </div>
        </form>

    </div>

@endsection
