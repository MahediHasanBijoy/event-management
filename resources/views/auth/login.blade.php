@extends('layouts.main')

@section('content')
    <!-- Sign In Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.html" class="">
                            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>LOGIN</h3>
                        </a>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" value="{{old('email')}}">
                        <label for="floatingInput">Email address</label>
                        <span class="mt-2 text-danger d-block">{{$errors->first('email')}}</span>
                        {{-- <x-input-error :messages="$errors->get('email')"  /> --}}
                    </div>
                    <div class="form-floating mb-4">
                        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                        <span class="mt-2 text-danger d-block">{{$errors->first('password')}}</span>
                        {{-- <x-input-error :messages="$errors->get('password')" class="mt-2" /> --}}
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1" >Remember Me</label>
                        </div>
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">Forgot Password</a>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Log In</button>
                    </form>
                    <p class="text-center mb-0">Don't have an Account? <a href="{{route('register')}}">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In End -->
@endsection