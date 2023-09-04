@extends('layout.masterlayout')
@section('content')
    <div class="row">
        <div class="col-md-4 offset-md-4">

            <div class="card form-holder">


                <div class="card-body">
                    <h1 class="text-primary text-center   ">User Update </h1>

                    @if (Session::has('error'))
                        <p class="text-danger">{{ session::get('error') }}</p>
                    @endif

                    <form action="{{ route('useredit', $user->id) }}" method="POST">
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
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                value="{{ $user->email }}">
                            @if ($errors->has('email'))
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            @endif
                        </div>
                        <div class="my-2">
                            <label for="class">Roll</label>
                            <select class="form-select" name="roll">
                                <option selected disabled>Select roll</option>
                                <option value="Admin"  {{ $user->roll == 'Admin' ? 'selected' : '' }} >Admin</option>
                                <option value="supervisor"  {{ $user->roll == 'supervisor' ? 'selected' : '' }}  > Supervisor</option>
                               
                            </select>
                            @if ($errors->has('roll'))
                                <p class="text-danger">{{ $errors->first('roll') }}</p>
                            @endif
                        </div>
                        <div class="col-4 text-center my-3">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
