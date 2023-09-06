
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
            <form action="{{ route('admin') }}" method="POST">
                @csrf
                @method('POST')

                <div class="my-3 text-center">
                    <h1 class="text-uppercase mb-2 font-weight-bold text-primary">Admin Form </h1>
                </div>
                <div class="my-2">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" >
                    @if ($errors->has('name'))
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="my-2">
                    <label for="father_name">Email Address</label>
                    <input type="email" name="email" class="form-control"  value="{{ old('email') }}"  >
                    @if ($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                    @endif
                </div>
                <div class="my-2">
                        <label for="class">Roll</label>
                        <select class="form-select" name="roll">
                            <option selected disabled>Select roll</option>
                            <option value="Admin" {{ old('roll') == 'Admin' ? 'selected' : '' }}>Admin</option>
                            <option value="Supervisor" {{ old('roll') == 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                           
                        </select>
                        @if ($errors->has('roll'))
                            <p class="text-danger">{{ $errors->first('roll') }}</p>
                        @endif
                    </div>
                <!-- Continue with other form fields -->
                <div class="my-2">
                    <label for="contact">Password</label>
                    <input type="password" name="password" class="form-control">
                    @if ($errors->has('password'))
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="my-2">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                <div class="text-center m-5">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary w-75">
                </div>
            </form>
        </div>
    </div>
@endsection
