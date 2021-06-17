@extends('dashboard/user/home')

@section('title', 'Courses')

@section('content')

<div class="container courses">

    <div class="row">

        @foreach($courses as $course)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="{{asset('imgs')}}/{{$course->image_path}}" width="500" height="300">
                <div class="caption">
                    <h4>{{ $course->cname }}</h4>
                    <p>{{ $course->description }}</p>
                    <p><strong>Price: </strong> {{ $course->cprice }}$</p>
                    <p class="btn-holder"><a href="{{ route('user.addtoc',$course->id) }}"
                            class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                </div>
            </div>
        </div>
        @endforeach

    </div><!-- End row -->

</div>

@endsection