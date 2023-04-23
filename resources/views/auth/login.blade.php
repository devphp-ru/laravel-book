@extends('layouts.default')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h1>Вход</h1>
            <form action="{{ route('login.handler') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" value="{{ old('email') }}" type="email" class="form-control">
                    @if ($errors->has('email'))
                        <small id="an_input_error-email" class="form-text text-danger">{{ $errors->first('email') }}</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" value="" type="password" class="form-control">
                    @if ($errors->has('password'))
                        <small id="an_input_error-password" class="form-text text-danger">{{ $errors->first('password') }}</small>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection