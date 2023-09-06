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
            <form action="{{ route('student') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('post')

                <div class="my-3 text-center">
                    <h1 class="text-uppercase mb-2 font-weight-bold text-primary">Student form </h1>
                </div>
                <div class="my-2">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control"   value="{{ old('name') }}"    >
                    @if ($errors->has('name'))
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="my-2">
                    <label for="father_name">Father Name</label>
                    <input type="text" name="father_name" class="form-control"  value="{{ old('father_name') }}"   >
                    @if ($errors->has('father_name'))
                        <p class="text-danger">{{ $errors->first('father_name') }}</p>
                    @endif
                </div>
                <div class="my-2">
                    <label for="mother_name">Mother Name</label>
                    <input type="text" name="mother_name" class="form-control   "   value="{{ old('mother_name') }}"   >
                    @if ($errors->has('mother_name'))
                        <p class="text-danger">{{ $errors->first('mother_name') }}       </p>
                    @endif
                </div>
                <div class="my-2">
                    <label for="class">Class</label>
                    <select class="form-select" name="class"  value="{{ old('class') }}"     >
                        <option selected disabled>Select Class</option>
                        <option value="one">One</option>
                        <option value="two">Two</option>
                        <option value="three">Three</option>
                    </select>
                    @if ($errors->has('class'))
                        <p class="text-danger">{{ $errors->first('class') }}</p>
                    @endif
                </div>
                <!-- Continue with other form fields -->
                <div class="my-2">
                    <label for="contact">Address</label>
                    <input type="text" name="address" class="form-control"  value="{{ old('address') }}"     >
                    @if ($errors->has('address'))
                        <p class="text-danger">{{ $errors->first('address') }}</p>
                    @endif
                </div>
                <div class="my-2">
                    <label for="contact">School</label>
                    <input type="text" name="school" class="form-control"   value="{{ old('school') }}"  >
                    @if ($errors->has('school'))
                        <p class="text-danger">{{ $errors->first('school') }}</p>
                    @endif
                </div>
                <div>
                    <label for="contact">Contact Number</label>
                    <input type="text" name="contact" class="form-control"  value="{{ old('contact') }}"   >
                    @if ($errors->has('contact'))
                        <p class="text-danger">{{ $errors->first('contact') }}</p>
                    @endif
                </div>
                <div class="my-2">
                    <label for="image">School Image</label>
                    <input class="form-control" type="file" name="image">
                    @if ($errors->has('image'))
                        <p class="text-danger">{{ $errors->first('image') }}</p>
                    @endif
                </div>

                <div class="text-center m-5">
                    <input type="submit" name="submit" value="Submit" class="btn btn-primary w-75">
                </div>
            </form>
        </div>
    </div>
@endsection
