@extends('dashboard/user/parent')



@section('content')
<div class="container userCourses">

    <div class="row">

        @foreach($enrolledCourses as $course)
        <div class="col-xs-18 col-sm-6 col-md-3">
            <div class="thumbnail">
                <img src="{{asset('imgs')}}/{{$course->course_image}}" width="500" height="300">
                <div class="caption">
                    <h4><a href="{{route('user.courseVideos')}}">{{ $course->course_name }}</a></h4>
                </div>
            </div>
        </div>
        @endforeach

    </div><!-- End row -->

</div>


@endsection