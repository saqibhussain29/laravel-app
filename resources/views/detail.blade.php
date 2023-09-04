@extends('layout.masterlayout')
@section('content')
    <div class="col-5 card shadow  justify-content-center mx-auto mb-3 my-5 ">
        <h1 class="  text-uppercase  justify-content-center mx-auto m-4 font-weight-bold text-primary"> data sheet </h1>
        <table class="table">
            <thead>
                <div  class="m-3">
                    <img src="{{ asset('storage/'. $student->image) }}"style="width:60px;height:70px;">
                </div>
                <!-- <tr> -->
                <tr>
                    <td> Name </td>
                    <td>{{ $student->name }}</td>
                </tr>
                <tr>
                    <td>Father name</td>
                    <td>{{ $student->father_name }}</td>
                </tr>
                <tr>
                    <td>Mother name</td>
                    <td>{{ $student->mother_name }}</td>
                </tr>
                <tr>
                    <td>Class</td>
                    <td>{{ $student->class }}</td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>{{ $student->address }}</td>
                </tr>
                <tr>
                    <td>School</td>
                    <td>{{ $student->school }}</td>
                </tr>
                <tr>
                    <td>Contact.no </td>
                    <td>{{ $student->contact }}</td>
                </tr>
            </thead>
        </table>
    </div>
@endsection
