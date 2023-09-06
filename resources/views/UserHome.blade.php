@extends('layout.masterlayout')
@section('content')
    <div class="col-25 card shadow m-5">
        <div class="card-header">
            <button class="custom-button" data-bs-toggle="collapse" data-bs-target="#collapseExample">
                <h5 class="text-uppercase font-weight-bold text-primary">Search Bar</h5>
            </button>
        </div>
        @php
            $isSearchSet = request()->has('name');
        @endphp
        <div class="{{ $isSearchSet ? 'show' : 'collapse' }}" id="collapseExample">
            <form class="example" action="{{ route('searches') }}" method="get">
                <div class="m-3">
                    <label for=""> Name</label>
                    <input type="text" name="name" id="namesearch" class="form-control" value="">
                </div>
                <div class="m-3">
                    <label for=""> Email</label>
                    <input type="text" name="email" id="emailsearch" class="form-control" value="">
                </div>

                <div class="d-flex justify-content-end m-3">
                    <a href="{{ url('/UserHome') }}" class="btn btn-primary m-2">RESET</a>
                    <button type="button" id="searchess" name="search" class="btn btn-primary m-2">search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="my-5 text-center">
        <h1 class="text-uppercase mb-5 font-weight-bold text-primary">User result</h1>
    </div>

    @if (session('hello'))
        <div class="alert alert-dark   m-5   " role="alert">
            <b>Data was deleted</b>

        </div>
    @endif
    @if (session('success'))
    <div class="alert alert-success   m-5   " role="alert">
        <b>Data was updatde</b>

    </div>
@endif
    @if (session('error'))
        <div class="alert alert-danger  m-5   " role="alert">
            <b>You Are currently login with this data </b>

        </div>
    @endif

    @if (session('active'))
        <div class="alert alert-success  m-5   " role="alert">
            <b>The account is now Active</b>

        </div>
        @endif @if (session('inactive'))
            <div class="alert alert-danger  m-5   " role="alert">
                <b>The account is now suspended</b>

            </div>
        @endif
        <div class="row justify-content-center m-5">
            <div class="col-26">
                <div class="card shadow">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center align-middle mt-3">

                            <form action="{{ route('users.deleteMultiple') }}" method="post">
                                @csrf
                                <thead>
                                    <tr>
                                        <th><button type="submit" class="btn btn-danger">Delete</button></th>
                                        <th scope="col">User ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Roll</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                        <th scope="col">Show</th>

                                    </tr>
                                </thead>
                                <tbody id="tbody">

                                    @foreach ($users as $user)
                                        <tr>


                                            <td>
                                                <input type="checkbox" name="selected_records[]" value="{{ $user->id }}"
                                                    class="checkbox">
                                            </td>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->roll }}</td>
                                            <td>
                                                <a href="{{ url('userstatus/' . $user->id) }}"
                                                    class="btn btn-{{ $user->status === 1 ? 'danger' : 'success' }}">
                                                    {{ $user->status === 1 ? 'Inactive' : 'Active' }}
                                                </a>
                                            </td>
                                            <td> <a href="{{ url('useredit/' . $user->id) }}"><i
                                                        class="fa-solid fa-edit"></i></a>
                                                |<a class='delete' onclick='return  ddelete()'
                                                    href="{{ url('delete' . $user->id) }}"><i
                                                        class="fa-sharp fa-solid fa-trash"></i></a>
                                            </td>
                                            <td> <a href="{{ url('user' . $user->id) }}"><i
                                                        class="fa-solid fa-eye"></i></a>
                                            </td>
                                        </tr>
                                        <!-- Add more data rows here as needed -->
                                    @endforeach
                                </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        
        <script>
            $(document).ready(function() {
                $("#searchess").on("click", function() {
                    var nameValue = $("#namesearch").val();
                    var emailValue = $("#emailsearch").val();
                    $.ajax({
                        url: "{{ route('searches') }}",
                        type: "GET",
                        data: {
                            'name': nameValue,
                            'email': emailValue
                        },
                        success: function(data) {
                            var users = data.users;
                            var html = '';

                            if (users.length > 0) {
                                for (let i = 0; i < users.length; i++) {
                                    html += '<tr>' +
                                        '<td><input type="checkbox" class="user-checkbox" value="' +
                                        users[i].id + '"></td>' +
                                        '<td>' + users[i].id + '</td>' +
                                        '<td>' + users[i].name + '</td>' +
                                        '<td>' + users[i].email + '</td>' +
                                        '<td>' + users[i].roll + '</td>' +
                                        '<td>' +
                                        '<a href="{{ url('userstatus') }}/' + users[i].id +
                                        '" class="btn btn-' + (users[i].status === 1 ? 'danger' :
                                            'success') + '">' +
                                        (users[i].status === 1 ? 'Inactive' : 'Active') +
                                        '</a>' +
                                        '</td>' +
                                        '<td>' +
                                        '<a href="{{ url('user') }}/' + users[i].id +
                                        '"><i class="fa-solid fa-edit"></i></a> | ' +
                                        '<a class="delete" onclick="return delete()" href="{{ url('delete') }}/' +
                                        users[i].id +
                                        '"><i class="fa-sharp fa-solid fa-trash"></i></a>' +
                                        '</td>' +
                                        '<td>' +
                                        '<a href="{{ url('user') }}/' + users[i].id +
                                        '"><i class="fa-solid fa-eye"></i></a>' +
                                        '</td>' +
                                        '</tr>';

                                }
                            } else {
                                html = '<tr><td colspan="5">No matching users found</td></tr>';
                            }

                            $("#tbody").html(html);
                        }
                    });
                });
            });
        </script>
    @endsection
