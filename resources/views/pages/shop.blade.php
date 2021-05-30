@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 80px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
            </ol>
        </nav>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-7">
                        <h4>Courses Available</h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    @foreach($course as $cou)
                        <div class="col-lg-3">
                            <div class="card" style="margin-bottom: 20px; height: auto;">
                                <img src="/images/{{ $cou->image_path }}"
                                     class="card-img-top mx-auto"
                                     style="height: 150px; width: 150px;display: block;"
                                     alt="{{ $cou->image_path }}"
                                >
                                <div class="card-body">
                                    <a href=""><h6 class="card-title">{{ $cou->cname }}</h6></a>
                                    <p>${{ $cou->cprice }}</p>
                                    <form action="{{ route('store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <input type="hidden" value="{{ $cou->cid }}" id="id" name="id">
                                        <input type="hidden" value="{{ $cou->cname }}" id="name" name="name">
                                        <input type="hidden" value="{{ $cou->cprice }}" id="price" name="price">
                                        <input type="hidden" value="{{ $cou->image_path }}" id="img" name="img">

                                        <div class="card-footer" style="background-color: white;">
                                              <div class="row">
                                                <button class="btn btn-secondary btn-sm" class="tooltip-test" title="add to cart">
                                                    <i class="fa fa-shopping-cart"></i> Add To Cart
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection