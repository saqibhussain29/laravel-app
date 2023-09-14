@extends('layout.app')
@section('content')
    <div class="row justify-content-center m-2">
        <div class="col-5 card shadow">
            @if (Session::has('error'))
                <p class="text-danger">{{ session::get('error') }}</p>
            @endif
            @if (Session::has('success'))
                <p class="text-success">{{ session::get('success') }}</p>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                @method('post')
                @if (session('su'))
                <div class="alert alert-success  m-5   " role="alert">
                    <b>Please wait for admin approval</b>
        
                </div>
            @endif
                <div class="my-3 text-center">
                    <h1 class="text-uppercase mb-2 font-weight-bold text-primary">login </h1>
                </div>
                @if (Session::has('error'))
                <p class="text-danger">{{ session::get('error') }}</p>
            @endif
            @if (Session::has('success'))
                <p class="text-success">{{ session::get('success') }}</p>
            @endif
                <div class="my-2">
                    <label for="father_name">Email Address</label>
                    <input type="email" name="email" class="form-control"  value="{{ old('email') }}"  >
                    @if ($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif
                    @if (Session::has('errorss'))
                    <p class="text-danger">{{ session::get('errorss') }}</p>
                @endif
                </div>
                <!-- Continue with other form fields -->
                <div class="my-2">
                    <label for="contact">Password</label>
                    <input type="password" name="password" class="form-control">
                    @if ($errors->has('password'))
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                    @endif
                    @if (Session::has('errorsss'))
                    <p class="text-danger">{{ session::get('errorsss') }}</p>
                @endif
                </div>
                <div class="text-center m-5">
                    <input type="submit" name="submit" value="Login" class="btn btn-primary w-75">
                </div>
            </form>
        </div>
    </div>
@endsection
