@extends('dashboard/user/parent')
@section('content')
<div class="container applyQuiz">
    <hr class="mt-6">
    <div>
        <form method="POST" action="{{route('user.quizStore')}}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-6 col-lg-6 col-sm-6 col-lg-offset-3">
                <div class="form-group">
                    <label class="col-form-label" for="formGroupExampleInput2">Exam Code</label>
                    <input type="text" name="exam_code" class="form-control" id="formGroupExampleInput2"
                        placeholder="E.g. A6xgP" required>
                </div>
                <button type="submit" class="btn btn-success btn-block">Submit</button><br><br>
                <h4 style="color: red">**Keep in mind that Question set (next page) would be invalid after limited exam
                    time. Try to
                    give Answer in time.</h4>
            </div>
        </form>
    </div>
</div>

@endsection