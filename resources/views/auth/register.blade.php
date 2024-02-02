@extends('layout.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12 col-sm-8 col-md-6">
            <form class="form mt-5" action="{{ route('register.store') }}" method="post">
                @csrf
                <h3 class="text-center text-dark">{{ __('ideas.register_form') }}</h3>
                <div class="form-group">
                    <label for="name" class="text-dark">{{ __('ideas.user_name') }} :</label><br>
                    <input type="name" value="{{ old('name') }}"  name="name" id="name" class="form-control">
                    @error('name')
                        <span class="fs-6 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="email" class="text-dark">Email:</label><br>
                    <input type="email" value="{{ old('email') }}" name="email" id="email" class="form-control">
                    @error('email')
                        <span class="fs-6 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password" class="text-dark">{{ __('ideas.pwd') }}:</label><br>
                    <input type="password" value="{{ old('password') }}" name="password" id="password" class="form-control">
                    @error('password')
                        <span class="fs-6 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group mt-3">
                    <label for="password_confirmation" class="text-dark">{{ __('ideas.confirm_pwd') }}:</label><br>
                    <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" id="password_confirmation" class="form-control">
                    @error('password_confirmation')
                        <span class="fs-6 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="remember-me" class="text-dark"></label><br>
                    <input type="submit" name="submit" class="btn btn-dark btn-md" value="submit">
                </div>
                <div class="text-right mt-2">
                    <a href="{{ route('login') }}" class="text-dark">{{ __('ideas.login_here') }}</a>
                </div>
            </form>
        </div>
    </div>
@endsection
