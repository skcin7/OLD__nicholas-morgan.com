@extends('layout')

@section('pageName', 'Admin_Misc')

@section('content')

    <div class="container">

        @include('_errors')

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}"><i class="icon-home"></i> Admin</a></li>
            <li class="breadcrumb-item">Misc</li>
        </ol>

        <form action="{{ url('admin/misc') }}" method="post">
            @csrf

            <div class="form-group row">
                <div class="col-md-12">
                    <div class="input-group">
                        <textarea class="form-control autosize" name="bio" placeholder="Bio" rows="4">{{ old('bio') ? old('bio') : Setting::get('bio') ? Setting::get('bio') : '' }}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit"><i class="icon-floppy"></i> Save</button>
                </div>
            </div>
        </form>

    </div>

@endsection
