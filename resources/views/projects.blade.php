@extends('layout')

@section('pageName', 'Projects')

@section('content')

    <div class="container">

        @include('_errors')

        @include('_page_not_in_menu_warning', ['page' => 'projects'])

        <h1 class="mb-3">Projects</h1>

        @if($projects->count())
            <div class="table-responsive">
                <table class="table table-hover table-border">
                    <thead class="thead-dark">
                    <tr>
                        <th>Project</th>
                        <th>Dates Completed</th>
{{--                        <th>Built With</th>--}}
                        <th>Notes</th>
                        <th class="text-right"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td>
                                @if(strlen($project->url))
                                    <a href="{{ $project->url }}" target="_blank">{{ $project->name }}</a>
                                @else
                                    {{ $project->name }}
                                @endif
                            </td>
                            <td>
                                {{ $project->dates_completed }}
                            </td>
{{--                            <td>--}}
{{--                                {!! Markdown::convertToHtml($project->built_with) !!}--}}
{{--                            </td>--}}
                            <td>
                                {!! Markdown::convertToHtml($project->notes) !!}
                            </td>
                            <td class="text-right">
                                <a class="btn btn-primary" href="{{ url('projects/' . $project->slug()) }}">More Details</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>No projects are listed.</p>
        @endif

    </div>

@endsection
