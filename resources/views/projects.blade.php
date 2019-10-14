@extends('layout')

@section('pageName', 'Projects')

@section('content')

    <div class="container">

        @include('_errors')

        @include('_page_not_in_menu_warning', ['page' => 'projects'])

        <h1 class="mb-3">Projects</h1>

        <div class="table-responsive">
            <table class="table table-hover table-border">
                <thead class="thead-dark">
                <tr>
                    <th>Project</th>
                    <th>Dates Completed</th>
                    <th>Built With</th>
                    <th class="text-right">Notes</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <a href="https://vgdb.io" target="_blank">VGDB: The Video Game Database</a>
                    </td>
                    <td>

                    </td>
                    <td>

                    </td>
                    <td class="text-right">

                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>

@endsection
