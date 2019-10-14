@extends('layout')

@section('pageName', 'Skills')

@section('content')

    <div class="container">

        @include('_errors')

        <div class="table-responsive">
            <table class="table table-hover table-border mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>Skill</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>AWS (Amazon Web Services) - S3</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

@endsection
