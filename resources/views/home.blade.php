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
            <form class="example" action="{{ route('search') }}" method="get">
                <div class="m-3">
                    <label for=""> Name</label>
                    <input type="text" name="name" id="names" class="form-control" value="">
                </div>
                <div class="m-3">
                    <label for="">Father Name</label>
                    <input type="text" name="father_name" id="father_names" class="form-control" value="">
                </div>
                {{-- <div class="m-3">
                    <label for="">Class</label>
                    <select class="form-select" name="class">
                        <option selected disabled>select your class</option>
                        <option value="1" {{ request('class') == 'one' ? 'selected' : '' }}>One</option>
                        <option value="2" {{ request('class') == 'two' ? 'selected' : '' }}>Two</option>
                        <option value="3" {{ request('class') == 'three' ? 'selected' : '' }}>Three</option>
                    </select>
                </div> --}}
                <div class="d-flex justify-content-end m-3">
                    <a href="{{ url('/home') }}" class="btn btn-primary m-2">RESET</a>
                    <button type="button" name="search" id="searchs" class="btn btn-primary m-2">search</button>
                </div>
            </form>
        </div>
    </div>

    <div class="my-5 text-center">
        <h1 class="text-uppercase mb-5 font-weight-bold text-primary">show result</h1>
    </div>
    @if (session('success'))
        <div class="alert alert-success  m-5   " role="alert">
            <b>Data Successfully updated</b>

        </div>
    @endif
    @if (session('enter'))
        <div class="alert alert-success  m-5   " role="alert">
            <b>Data Successfully Enter</b>

        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger  m-5   " role="alert">
            <b>Data Successfully delete</b>

        </div>
    @endif
    <div class="row justify-content-center m-5">
        <div class="col-26">
            <div class="card shadow">
                <div class="table-responsive">
                    <table class="table table-bordered text-center align-middle mt-3">
                        <thead>
                            <tr>
                                <th scope="col">Student ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Father Name</th>
                                <th scope="col">Mother Name</th>
                                <th scope="col">Class</th>
                                <th scope="col">Address</th>
                                <th scope="col">School</th>
                                <th scope="col">Contact no</th>
                                <th scope="col">Image</th>
                                <th scope="col">Action</th>
                                <th scope="col">Show</th>
                            </tr>
                        </thead>
                        <tbody id="tbodys">
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->father_name }}</td>
                                    <td>{{ $student->mother_name }}</td>
                                    <td>{{ $student->class }}</td>
                                    <td>{{ $student->address }}</td>
                                    <td>{{ $student->school }}</td>
                                    <td>{{ $student->contact }}</td>
                                    <td><img
                                            src="{{ asset('storage/' . $student->image) }}"style="width:50px;height:60px;">
                                </td>
                                <td>
                                        <a href="{{ url('show' . $student->id) }}"><i class="fa-solid fa-edit"></i></a>
                                        | <a class='deletes' onclick='return checkdelete()'
                                            href="{{ url('deletes' . $student->id) }}"><i
                                                class="fa-sharp fa-solid fa-trash"></i></a>
                                    </td>
                                    <td> <a href="{{ url('detail' . $student->id) }}"><i class="fa-solid fa-eye"></i></a>
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
@section('home')
    <script>
        $(document).ready(function() {
            $("#searchs").on("click", function() {
                var nameValue = $("#names").val();
                var fatherValue = $("#father_names").val();
                $.ajax({
                    url: "{{ route('search') }}",
                    type: "GET",
                    data: {
                        'name': nameValue,
                        'father_name': fatherValue
                    },
                    success: function(data) {
                        var students = data.students;
                        var html = '';

                        if (students.length > 0) {
                            for (let i = 0; i < students.length; i++) {
                                html += `<tr>
                                    <td> ${students[i].id}  </td>
                                    <td> ${students[i].name}  </td>
                                    <td> ${students[i].father_name}  </td>
                                    <td> ${students[i].mother_name}  </td>
                                    <td> ${students[i].class}  </td>
                                    <td> ${students[i].address}  </td>
                                    <td> ${students[i].school}  </td>
                                    <td> ${students[i].contact}  </td>
                                    <td><img src="{{asset('storage')}}/${students[i].image}" style="width: 50px; height: 60px;"></td>
                                    <td>
                    <a href="{{ url('show')}}${students[i].id}"><i class="fa-solid fa-edit"></i></a>
                    | <a class="deletes" onclick="return checkdelete()" href="{{ url('deletes')}} ${students[i].id}">
                    <i class="fa-sharp fa-solid fa-trash"></i></a>
                    </td>
                                    
                 
 
                                </tr>`;
                            }
                        } else {
                            html = '<tr><td colspan="4">No matching users found</td></tr>';
                        }

                        $("#tbodys").html(html);
                    }
                });
            });
        });
    </script>
@endsection
