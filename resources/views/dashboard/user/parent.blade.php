<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>


    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        body{
            padding-top:50px;
        }
        .dropdown {
            float: right;
            padding-right: 30px;
        }

        .dropdown .dropdown-menu {
            padding: 20px;
            top: 30px !important;
            width: 350px !important;
            left: -110px !important;
            box-shadow: 0px 5px 30px black;
        }

        .total-header-section {
            border-bottom: 1px solid #d2d2d2;
        }

        .total-section p {
            margin-bottom: 20px;
        }

        .cart-detail {
            padding: 15px 0px;
        }

        .cart-detail-img img {
            width: 100%;
            height: 100%;
            padding-left: 15px;
        }

        .cart-detail-product p {
            margin: 0px;
            color: #000;
            font-weight: 500;
        }

        .cart-detail .price {
            font-size: 12px;
            margin-right: 10px;
            font-weight: 500;
        }

        .cart-detail .count {
            color: #C2C2DC;
        }

        .checkout {
            border-top: 1px solid #d2d2d2;
            padding-top: 15px;
        }

        .checkout .btn-primary {
            border-radius: 50px;
            height: 50px;
        }

        .dropdown-menu:before {
            content: " ";
            position: absolute;
            top: -20px;
            right: 50px;
            border: 10px solid transparent;
            border-bottom-color: #fff;
        }

        .thumbnail {
            position: relative;
            padding: 0px;
            margin-bottom: 20px;
        }

        .thumbnail img {
            width: 100%;
        }

        .thumbnail .caption {
            margin: 7px;
        }

        .page {
            margin-top: 50px;
        }

        .btn-holder {
            text-align: center;
        }

        .table>tbody>tr>td,
        .table>tfoot>tr>td {
            vertical-align: middle;
        }

        @media screen and (max-width: 600px) {
            table#cart tbody td .form-control {
                width: 20%;
                display: inline !important;
            }

            .actions .btn {
                width: 36%;
                margin: 1.5em 0;
            }

            .actions .btn-info {
                float: left;
            }

            .actions .btn-danger {
                float: right;
            }

            table#cart thead {
                display: none;
            }

            table#cart tbody td {
                display: block;
                padding: .6rem;
                min-width: 320px;
            }

            table#cart tbody tr td:first-child {
                background: #333;
                color: #fff;
            }

            table#cart tbody td:before {
                content: attr(data-th);
                font-weight: bold;
                display: inline-block;
                width: 8rem;
            }



            table#cart tfoot td {
                display: block;
            }

            table#cart tfoot td .btn {
                display: block;
            }

        }

        }

        .credit-card-div span {
            padding-top: 10px;
        }

        .credit-card-div img {
            padding-top: 30px;
        }

        .credit-card-div .small-font {
            font-size: 9px;
        }

        .credit-card-div .pad-adjust {
            padding-top: 10px;
        }

        .open-button {
            background-color: #555;
            color: white;
            padding: 16px 20px;
            border: none;
            cursor: pointer;
            opacity: 0.8;
            position: fixed;
            bottom: 23px;
            right: 28px;
            width: 280px;
        }

        /* The popup chat - hidden by default */
        .chat-popup {
            display: none;
            position: fixed;
            bottom: 0;
            right: 15px;
            border: 3px solid #f1f1f1;
            z-index: 9;
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            overflow: hidden;
        }
    </style>
    <link href="/css/styles.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top py-6 ">
            <div class="container-fluid">
                <div class="collapse-navbar-coolapse">
                    <ul class="navbar-nav">
                        <a class="navbar-brand" href="{{route('user.home')}}">Skills University</a>

                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{route('user.courses')}}">Store</a>
                        </li>
                        {{-- might use later --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('user.yourCourses')}}">Your Courses</a>
                        </li>
                    </ul>
                </div>

                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <div>
                            {{-- <i class=" fa fa-shopping-cart" aria-hidden="true"></i> --}}
                            <a href="{{ route('user.cart') }}" class="btn btn-primary btn-block">Cart</a>
                        </div>
                        {{-- <div class="dropdown"> --}}
                        {{-- <button type="button" data-toggle="dropdown">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <a href="{{ route('user.cart') class="btn " }}">Cart</a>
                        {{-- <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                        --}}
                        {{-- </button> --}}
                        {{-- <div class=" dropdown-menu">
                                <div class="row total-header-section">
                                    <div class="col-lg-6 col-sm-6 col-6">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span
                                            class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
            </div>
            <?php $total = 0 ?>
            @foreach((array) session('cart') as $id => $details)
            <?php $total += $details['cprice'] ?>
            @endforeach
            <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
                <p>Total: <span class="text-info">$ {{ $total }}</span></p>
            </div>
    </div>
    @if(session('cart'))
    @foreach(session('cart') as $id => $details)
    <div class="row cart-detail">
        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
            <img src="{{asset('imgs')}}/{{ $details['image_path'] }}" />
        </div>
        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
            <p>{{ $details['cname'] }}</p>
            <span class="price text-info"> ${{ $details['cprice'] }}</span>
        </div>
    </div>
    @endforeach
    @endif --}}
    {{-- <div class="row">
                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
                    <a href="{{ route('user.cart') }}" class="btn ">View
    all</a>
    </div>
    </div> --}}
    {{-- </div>
    </div>
    </li>  --}}
    {{-- <li>
        <div class="widgets-wrap d-flex justify-content-end">
            <div class="widget-header">
                <a href="#" class="icontext">
                    <div class="icon-wrap icon-xs bg2 round text-secondary"><i class="fa fa-shopping-cart"></i></div>
                    <div class="text-wrap">
                        <small>{{ $cartCount }} items</small>
    </div>
    </a>
    </div>
    </li> --}}

    <li><a href="#"><span class="d-flex align-items-center" style="margin-left:30px;
  margin-right:30px;">
                <span class="d-none d-sm-inline mx-1">{{Auth::guard('web')->user()->name }}</span>
        </a></li>

    <li> <a href="{{ route('user.logout') }}"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
            <span class="ms-1 d-none d-sm-inline  mt-5">Logout</span>
            <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">
                @csrf
            </form>
        </a>
    </li>


    </ul>


    </div>
    </nav>
    </div>

    <div class="container page">
        @yield('content')
    </div>

    @yield('scripts')
    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>



</body>

</html>