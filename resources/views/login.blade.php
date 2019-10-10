@extends('layout')

@section('pageName', 'Login')

@section('content')

    <div class="container">

        @include('_errors')

        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="{{ url('login') }}" method="post">
                    @csrf

                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label text-md-right" for="name">Who Are You:</label>

                        <div class="col-md-6">
                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="name" name="name" type="text"  value="{{ old('name') }}" required autofocus>

                            @if($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right" for="password">Speak, Friend, and Enter:</label>

                        <div class="col-md-6">
                            <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" id="password" name="password" type="password" required>

                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check abc-checkbox abc-checkbox-primary">
                                <input class="form-check-input" id="remember" name="remember" type="checkbox" checked>

                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Enter
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection
