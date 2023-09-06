@extends('layout.masterlayout')
@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">

            <div class="card form-holder">


                <div class="card-body">
                    <h1 class="text-primary text-center   "> Password Update </h1>
                    @if (Session::has('error'))
                        <p class="text-danger">{{ session::get('error') }}</p>
                    @endif

                    <form action="{{ route('UserPassword', $user->id) }}" method="post">
                        @csrf

                        @method('post')


                        <div class="form-group">
                            <label for="exampleInputPassword1">Old Password</label>
                            <input type="password" class="form-control" name="current_password"
                                placeholder="type old password">
                            @if ($errors->has('current_password'))
                                <p class="text-danger">{{ $errors->first('current_password') }}</p>
                            @endif
                            @if (session('password_error'))
                                <p class="text-danger">{{ session('password_error') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">New Password</label>
                            <input type="password" class="form-control" name="password">
                            @if ($errors->has('password'))
                                <p class="text-danger">{{ $errors->first('password') }}</p>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>confirm password</label>
                            <input type="password" class="form-control" name="password_confirmation">
                        </div>
                        <div class="text-center m-5">
                            <input type="submit" name="submit" value="update" class="btn btn-primary w-75">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
