@extends('layout.masterlayout')
@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">

            <div class="card form-holder">


                <div class="card-body">
                    <h1 class="text-primary text-center   "> Profile </h1>

                    @if (Session::has('error'))
                        <p class="text-danger">{{ session::get('error') }}</p>
                    @endif

                    <form action="{{ route('edit', $user->id) }}" method="POST">
                        @csrf

                        @method('POST')

                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" value=" {{ $user->name }}">
                            @if ($errors->has('name'))
                                <p class="text-danger">{{ $errors->first('name') }}</p>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                value="{{ $user->email }}">
                            @if ($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            @endif
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
