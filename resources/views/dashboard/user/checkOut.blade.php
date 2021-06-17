@extends('dashboard/user/parent')
@section('content')
<div class="container checkOut">
    <hr class="mt-5">
    <div class="card mx-auto d-flex justify-content-center col-6">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
        @endif
        <form method="POST" action="{{route('user.pay')}}" enctype="multipart/form-data" class="credit-card-div">
            @csrf
            <div class="panel panel-default">
                <div class="panel-heading">

                    <div class="row ">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="cardNumber" placeholder="Enter Card Number" />
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <span class="help-block text-muted small-font"> Expiry Month</span>
                            <input type="text" class="form-control" name="cardMonth" placeholder="MM" />
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <span class="help-block text-muted small-font"> Expiry Year</span>
                            <input type="text" class="form-control" name="cardYear" placeholder="YY" />
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <span class="help-block text-muted small-font"> CCV</span>
                            <input type="text" class="form-control" name="cardccv" placeholder="CCV" />
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <img src="assets/img/1.png" class="img-rounded" />
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12 pad-adjust">

                            <input type="text" name="cardName" class="form-control" placeholder="Name On The Card" />
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                            <button type="submit" class="btn btn-dark"><a
                                    href="{{route('user.cart')}}">Cancel</a></button>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6 pad-adjust">
                            <button type="submit" class="btn btn-warning btn-block">Pay Now</button>
                        </div>
                    </div>

                </div>
            </div>
        </form>
    </div>
</div>
@endsection