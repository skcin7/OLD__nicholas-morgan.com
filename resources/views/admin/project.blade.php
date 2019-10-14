@extends('layout')

@section('pageName', 'Admin_Project')

@section('content')

    <div class="container">

        @include('_errors')

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}"><i class="icon-home"></i> Admin</a></li>
            <li class="breadcrumb-item"><a href="{{ url('projects') }}">Projects</a></li>
            <li class="breadcrumb-item">{{ $project->exists ? $project->id : 'Create Project' }}</li>
        </ol>

        <form action="{{ url($project->exists ? 'admin/projects/' . $project->id : 'admin/projects') }}" method="post">
            @csrf

            <div class="form-group row">
                <div class="col-md-12">
                    <input class="form-control" name="name" placeholder="Name" type="text" value="{{ $project->exists ? $project->name : old('name') }}" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <input class="form-control" name="url" placeholder="URL" type="text" value="{{ $project->exists ? $project->url : old('url') }}">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <input class="form-control" name="dates_completed" placeholder="Dates Completed" type="text" value="{{ $project->exists ? $project->dates_completed : old('dates_completed') }}">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <div class="input-group">
                        <textarea class="form-control autosize" name="built_with" placeholder="Built With" rows="4">{{ $project->exists ? $project->built_with : old('built_with') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <div class="input-group">
                        <textarea class="form-control autosize" name="notes" placeholder="Notes" rows="4">{{ $project->exists ? $project->notes : old('notes') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="published" {{ $project->exists && $project->published ? 'checked' : '' }}> Published
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12">
                    <button class="btn btn-primary" type="submit">{{ $project->exists ? 'Save' : 'Create' }} Project</button>
                    @if($project->exists)
                        <button class="btn btn-danger" name="delete_project" type="submit" value="1" onclick="if(! confirm('Really delete project?')) { return false; }">Delete</button>
                    @endif
                </div>
            </div>
        </form>

    </div>

@endsection
