@extends('layout')

@section('pageName', 'Admin_Projects')

@section('content')

    <div class="container">

        @include('_errors')

        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admin') }}"><i class="icon-home"></i> Admin</a></li>
            <li class="breadcrumb-item">Projects</li>
        </ol>

        @if($projects->count())
            <div class="table-responsive">
                <table class="table table-hover table-border">
                    <thead class="thead-dark">
                    <tr>
                        <th>Project</th>
                        <th>Published</th>
                        <th class="text-right"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td>
                                {{ $project->name }}
                            </td>
                            <td>
                                {{ $project->published ? 'Yes' : 'No' }}
                            </td>
                            <td class="text-right">
                                <a class="btn btn-primary" href="{{ url('admin/projects/' . $project->id) }}">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>No projects.</p>
        @endif

        <a class="btn btn-primary" href="{{ url('admin/projects/create') }}">Create Project</a>

    </div>

@endsection
