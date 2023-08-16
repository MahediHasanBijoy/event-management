@extends('layouts.main')

@section('content')
    <!-- Sign In Start -->
    <div class="container-fluid">
        <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
            <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <a href="index.html" class="">
                            <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>SIGNUP</h3>
                        </a>
                    </div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                    
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="name" :value="old('name')" id="floatingText" placeholder="jhondoe">
                            <label for="floatingText">Name</label>
                            <span class="mt-2 text-danger d-block">{{$errors->first('name')}}</span>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com" value="{{old('email')}}">
                            <label for="floatingInput">Email address</label>
                            <span class="mt-2 text-danger d-block">{{$errors->first('email')}}</span>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                            <span class="mt-2 text-danger d-block">{{$errors->first('password')}}</span>
                        </div>
                        {{-- Confirm Password --}}
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Password">
                            <label for="password_confirmation">Confirm Password</label>
                            <span class="mt-2 text-danger d-block">{{$errors->first('password_confirmation')}}</span>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
                    </form>
                    <p class="text-center mb-0">Already have an Account? <a href="{{route('login')}}">Log In</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Sign In End -->
@endsection