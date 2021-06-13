@extends('dashboard/instructor/home')

@section('content')

<div class="container course-upload ">
    <hr class="mt-5">
    <div class="card mx-auto d-flex justify-content-center col-6">
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{Session::get('success')}}
        </div>
        @endif
        <form method="POST" action="{{route('instructor.courseUpload')}}" enctype="multipart/form-data" class="row g-3">
            @csrf
            <div class="col-md-12">
                <label for="cname" class="form-label">Course Name</label>
                <input type="text" class="form-control" name="cname">
            </div>
            <div class="col-md-12 form-floating">
                <label for="exampleFormControlTextarea1" class="form-label">Course Description</label>
                <textarea class="form-control" name="description"></textarea>
            </div>
            <div class=" col-md-12 mb-3">
                <label for="cprice" class="form-label">Course Price</label>
                <input type="text" class="form-control" aria-label="Dollar amount (with dot and two decimal places)"
                    name="cprice">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="vfile">Upload video</label>
                <input type="file" class="form-control" name="vfile">
            </div>
            <div class="input-group mb-3">
                <label class="input-group-text" for="ifile">Upload image</label>
                <input type="file" class="form-control" name="ifile">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>


</div>
@endsection