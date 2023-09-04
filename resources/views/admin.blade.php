

@extends('layout.masterlayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card form-holder">
                    <div class="card-body  text-center ">
                        <h1 class="mb-3">Admin </h1>
                        @if (Session::has('error'))
                            <p class="text-danger">{{ session::get('error') }}</p>
                        @endif
                        <form action="{{ route('admin') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name">
                                @if ($errors->has('name'))
                                  <p class="text-danger">{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name="email">
                                @if ($errors->has('email'))
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="class">Roll</label>
                                <select class="form-select" name="roll">
                                    <option selected disabled>Select roll</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Supervisor">Supervisor</option>
                                   
                                </select>
                                @if ($errors->has('roll'))
                                    <p class="text-danger">{{ $errors->first('roll') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" class="form-control" name="password">
                                @if ($errors->has('password'))
                                    <p class="text-danger">{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>confirm password</label>
                                <input type="password" class="form-control" name="password_confirmation">
                            </div>
                            <div class="col-  text-left m-4">
                                <input type="submit" class="btn btn-primary" value=" login ">
                            </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
