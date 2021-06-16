<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Instructor Dashboard | Home</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

    <style>
    body{
        overflow:hidden;
        font-family: 'Nunito', sans-serif;
    }

    
    </style>
    <link href="/css/styles.css" rel="stylesheet" />
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" --}}
    {{-- integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> --}}
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-6">
            <div class="container-fluid">
                <div class="collapse-navbar-coolapse">
                    <ul class="navbar-nav">
                        <a class="navbar-brand" href="{{route('instructor.home')}}">Skills University</a>

                        {{-- <li class="nav-item">
                            <a class="nav-link active" aria-current="page"
                                href="{{route('instructor.dashboard')}}">Dashboard</a>
                        </li> --}}
                        {{-- might use later --}}
                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('instructor.createCourse')}}">Create Course</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="{{route('instructor.createQuiz')}}">Create Quiz</a>
                        </li>
                    </ul>
                </div>


                <ul class="nav navbar-nav navbar-right">

                    <li>
                        <a href="#"><span class="d-flex align-items-center" style="margin-left:30px;margin-right:30px;">
                                <span class="d-none d-sm-inline mx-1">{{Auth::guard('instructor')->user()->name }}
                                </span>
                        </a>
                    </li>
                    <li> <a href="{{ route('user.logout') }}"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <span class="ms-1 d-none d-sm-inline  mt-5">Logout</span>
                            <form action="{{ route('instructor.logout') }}" method="post" class="d-none"
                                id="logout-form">
                                @csrf</form>
                        </a></li>
                </ul>
            </div>
        </nav>
    </div>
   
   

        

    

    <div class="container page">
        @yield('content')
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>


</body>

</html>