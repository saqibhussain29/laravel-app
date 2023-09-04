@extends('layout.masterlayout')
@section('content')
    <div class="col-5 card shadow  justify-content-center mx-auto mb-3 my-5 ">
        <h1 class="    justify-content-center mx-auto m-4 font-weight-bold text-primary">  Profile </h1>
        <table class="table">
            <thead>
                <!-- <tr> -->
                <tr>
                    <td class="fs-4"> User Id:</td>
                    <td class="fs-5">{{ $user->id }}</td>
                </tr>
                <tr>
                    <td class="fs-4">Name:</td>
                    <td class="fs-5" >{{ $user->name }}</td>
                </tr>
                <tr>
                    <td class="fs-4" >Email:</td>
                    <td class="fs-5" >{{ $user->email }}</td>
                </tr>
                <tr>
                    <td class="fs-4" >Roll:</td>
                    <td class="fs-5" >{{ $user->roll }}</td>
                </tr>
               
            </thead>
        </table>
    </div>
@endsection
