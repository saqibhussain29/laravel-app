
@extends('layout.masterlayout')
@section('content')
    <div class="row justify-content-center m-2">
        <div class="col-5 card shadow">
            @if (Session::has('error'))
                <p class="text-danger">{{ session::get('error') }}</p>
            @endif
            @if (Session::has('success'))
                <p class="text-success">{{ session::get('success') }}</p>
                
            @endif
            <form action="{{ route('useredit', $user->id) }}" method="POST">
                @csrf
                @method('POST')
                <div class="my-3 text-center">
                    <h1 class="text-uppercase mb-2 font-weight-bold text-primary">User Form </h1>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $user->name }}">
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
                    @if (Session::has('errord'))
                    <p class="text-danger">{{ session::get('errord') }}</p>
                @endif
                </div>
                <div class="my-2">
                    <label for="class">Roll</label>
                    <select class="form-select" name="roll">
                        <option selected disabled>Select roll</option>
                        <option value="Admin" {{ $user->roll == 'Admin' ? 'selected' : '' }}>Admin</option>
                        <option value="supervisor" {{ $user->roll == 'supervisor' ? 'selected' : '' }}>Supervisor
                        </option>
                    </select>
                    @if ($errors->has('roll'))
                        <p class="text-danger">{{ $errors->first('roll') }}</p>
                    @endif
                </div>
                <!-- Continue with other form fields -->
                <div class="my-2">
                    <label for="class">Status</label>
                    <select class="form-select" name="status">
                        <option selected disabled>Select status</option>
                        <option value="0" {{ $user->status == 0 ? 'selected' : '' }}>Active</option>
                        <option value="1" {{ $user->status == 1 ? 'selected' : '' }}>Inactive</option>
                    </select>
                    @if ($errors->has('status'))
                        <p class="text-danger">{{ $errors->first('status') }}</p>
                    @endif
                </div>
                <div class="text-center m-5">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary w-75">
                </div>
            </form>
        </div>
    </div>
@endsection
