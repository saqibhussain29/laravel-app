<nav class="navbar navbar-expand-lg navbar-light bg-light ">

    <div>
        <ul class="navbar-nav ">
            <li class="nav-item active">
                <a class="nav-link    text-primary " href="{{ url('/home') }}">Home</a>
            </li>
            <li class="" style="position: absolute; top: 50; right: 5%;"   >
                <a class="nav-link dropdown-toggle  text-capitalize     "class="font-weight-bold" data-bs-toggle="dropdown" href=""
                    role="button"> <b>{{ Auth::user()->name }}</b> </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item  text-primary "href="{{ url('edit', ['id' => Auth::user()->id]) }}"> <i
                                class="fa-solid fa-user pe-2"></i>Profile      </a></li>
                    <li>
                        <hr class="dropdown-divider">
                        <li><a class="dropdown-item    "href="{{ url('UserPassword', ['id' => Auth::user()->id]) }}"> <i
                            class="fa-solid fa-lock pe-2"></i>Password</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item text-danger    " href="{{ route('logout') }}"> <i
                                class="fas fa-door-open pe-2"></i>Logout</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            </li>
                            <li><a class="dropdown-item text-success    " href="{{ route('admin') }}"> <i
                                        class="fas fa-circle-user pe-2"></i>Admin</a></li>
                </ul>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-primary " href="{{ url('/student') }}">Student</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link    text-primary " href="{{ url('/admin') }}">UserForm </a>
            </li>
            @if (auth()->check() && auth()->user()->roll ==='Admin')
            <li class="nav-item active">
                <a class="nav-link    text-primary " href="{{ url('/UserHome') }}">Users</a>
            </li>
           @endif
        </ul>
    </div>
</nav>

