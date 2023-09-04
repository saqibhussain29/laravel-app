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
            <form action="{{ route('show', $student->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="my-3 text-center">
                    <h1 class="text-uppercase mb-2 font-weight-bold text-primary">Sheet</h1>
                </div>
                <div class="my-2">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ $student->name }}" class="form-control">
                    @if ($errors->has('name'))
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="my-2">
                    <label for="father_name">Father Name</label>
                    <input type="text" name="father_name" value="{{ $student->father_name }}" class="form-control">
                    @if ($errors->has('father_name'))
                        <p class="text-danger">{{ $errors->first('father_name') }}</p>
                    @endif
                </div>
                <div class="my-2">
                    <label for="mother_name">Mother Name</label>
                    <input type="text" name="mother_name"value="{{ $student->mother_name }}"class="form-control">
                    @if ($errors->has('mother_name'))
                        <p class="text-danger">{{ $errors->first('mother_name') }}</p>
                    @endif
                </div>
                <div class="my-2">
                    <label for="class">Class</label>
                    <select class="form-select" name="class">
                        <option disabled>Select Class</option>
                        <option value="1" {{ $student->class == 'One' ? 'selected' : '' }}>One</option>
                        <option value="2" {{ $student->class == 'two' ? 'selected' : '' }}>Two</option>
                        <option value="3" {{ $student->class == 'three' ? 'selected' : '' }}>Three</option>
                    </select>
                    @if ($errors->has('class'))
                        <p class="text-danger">{{ $errors->first('class') }}</p>
                    @endif
                </div>


                <div class="my-2">
                    <label for="contact">address</label>
                    <input type="text" name="address" value="{{ $student->address }}" class="form-control">
                    @if ($errors->has('address'))
                        <p class="text-danger">{{ $errors->first('address') }}</p>
                    @endif
                </div>
                <div>
                    <label for="contact">school</label>
                    <input type="text" name="school" value="{{ $student->school }}" class="form-control">
                    @if ($errors->has('school'))
                        <p class="text-danger">{{ $errors->first('school') }}</p>
                    @endif
                </div>
                <div class="my-2">
                    <label for="contact">Contact Number</label>
                    <input type="text" name="contact" value="{{ $student->contact }}" class="form-control">
                    @if ($errors->has('contact'))
                        <p class="text-danger">{{ $errors->first('contact') }}</p>
                    @endif
                </div>
                <div id="imageContainer" class="mb-3 {{ empty($student->image) ? 'd-none' : '' }}">
                    <div style="position: relative;">
                        <img src="{{ asset('storage/'.$student->image) }}" style="width:60px; height:70px;">
                        <button id="btn" type="button" class="btn-close" style="position: absolute; top: 0; right: 0;" data-toggle="modal" data-target="#deleteImageModal"></button>
                    </div>
                </div>                
                <div id="inputField" class="{{ !empty($student->image) ? 'd-none' : '' }}">
                    <label for="image">School Image</label>
                    <input class="form-control" type="file" name="image">
                    @if ($errors->has('image'))
                        <p class="text-danger">{{ $errors->first('image') }}</p>
                    @endif
                </div>
                <div class="text-center m-5">
                    <input type="submit" name="submit" value="Update" class="btn btn-primary w-75">
                </div>
            </form>
        </div>
    </div>
@endsection
