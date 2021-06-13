@extends('dashboard/instructor/home')

@section('content')
<div class="container createQuiz">
<hr class="mt-5">
<div class="card mx-auto d-flex justify-content-center col-6">
<form method="POST" action="{{route('instructor.uploadQuiz')}}">
	{{ csrf_field() }}

	
	  
	  <div class="form-group">
	    <label class="col-form-label" for="formGroupExampleInput2">Course Name</label>
	    <input type="text" name="course" class="form-control" id="formGroupExampleInput2" placeholder="example:SWE111" required>
	  </div>
	  <div class="form-group">
	    <label class="col-form-label" for="formGroupExampleInput2">Number Of Question</label>
	    <input type="text" name="question_length" class="form-control" id="formGroupExampleInput2" placeholder="E.g 10" required>
	  </div>
	  <div class="form-group">
	    <label class="col-form-label" for="formGroupExampleInput2">Set time</label>
	    <input type="text" name="time" class="form-control" id="formGroupExampleInput2" placeholder="Enter In Minutes" required>
	  </div>
	  <div class="form-group">
	    <input type="hidden" value="{{substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 5)}}" name="uniqueid" class="form-control" id="formGroupExampleInput2">
	  </div>
	  <button type="Submit" class="btn btn-success btn-block">Submit</button>
	

</form>
</div>
</div>

@endsection