@extends('dashboard/user/parent')
@section('content')

<div class="container checkOut text-center fluid">

<h2>PAYMENT</h2>
   
    <div class="col-lg-6 mx-auto text-center border-rounded bg-info  mt-1 pt-4 pb-4">
   
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
        @endif
        
        <form name="payment" method="POST" action="{{route('user.pay')}}" enctype="multipart/form-data" class="credit-card-div" onsubmit="validateForm()">
            @csrf
            <div class="panel panel-default">
                <div class="panel-heading">

                    <div class="row ">
                        <div class="col-md-12">
                            <input type="number" class="form-control" name="cardNumber" id="cnumber" placeholder="Enter Card Number" />
                            <div class="error" id="numErr"></div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-3 col-sm-3 col-xs-3 pt-4">
                            <span class="help-block text-muted small-font"> Expiry Month</span>
                            <input type="number" class="form-control" name="cardMonth"  id="cmonth" placeholder="MM" />
                            <div class="error" id="monthErr"></div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 pt-4">
                            <span class="help-block text-muted small-font"> Expiry Year</span>
                            <input type="number" class="form-control" name="cardYear" id="cyear" placeholder="YY" />
                            <div class="error" id="yearErr"></div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3 pt-4">
                            <span class="help-block text-muted small-font"> CCV</span>
                            <input type="number" class="form-control" name="cardccv" id="ccvv" placeholder="CCV" />
                            <div class="error" id="cvvErr"></div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <img src="\images\visaa.png" class="img w-100 h-90" />
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12 pad-adjust pt-2">

                            <input type="text" name="cardName" class="form-control" id="cname" placeholder="Name On The Card" />
                            <div class="error" id="nameErr"></div>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                            <button type="submit" class="btn btn-danger border btn-block"><a class="cancel text-white text-decoration-none"
                                    href="{{route('user.cart')}}">Cancel</a></button>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                            <button type="submit" class="btn btn-block btn-success border">Pay Now</button>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($carts as $cart)
                        <input type="hidden" name="courseId" value="{{$cart->course_id}}">
                        @endforeach
                    </div>

                </div>
            </div>
        </form>
        <script src="/js/payment.js"></script>
    </div>


@endsection
