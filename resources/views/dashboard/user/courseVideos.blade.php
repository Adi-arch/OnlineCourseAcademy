@extends('dashboard/user/parent')



@section('content')
<div class="container courseVideos">
    <hr class="mt-6">

    <div class="row">
        @foreach ($courseVideos as $cVideo)

        @endforeach
        <div class="d-flex align-items-center  mb-3 embed-responsive embed-responsive-21by9">
            <iframe class="embed-responsive-item" src="{{asset('videos')}}/{{$cVideo->course_video}}"></iframe>
        </div>

    </div>
</div>

@endsection