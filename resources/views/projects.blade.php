@extends('layout')

@section('pageName', 'Projects')

@section('content')

    <div class="container">

        @include('_errors')

        @include('_page_not_in_menu_warning', ['page' => 'projects'])

        <h1>Projects</h1>

        <div class="table-responsive">
            <table class="table table-hover table-border mt-3">
{{--                <thead class="thead-dark">--}}
{{--                <tr>--}}
{{--                    <th>Skill</th>--}}
{{--                </tr>--}}
{{--                </thead>--}}
                <tbody>
                <tr>
                    <td><a href="https://vgdb.io" target="_blank">VGDB: The Video Game Database</a></td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>

@endsection
