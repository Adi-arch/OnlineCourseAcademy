@extends('dashboard/instructor/parent')

@section('content')
<div class="container createQuiz pt-5">
<div class="h pt-2 text-center">
    <h4>CREATE QUIZ</h4>
</div>

	<div class="card mx-auto d-flex justify-content-center col-6">
		<form method="POST" action="{{route('instructor.uploadQuiz')}}">
			{{ csrf_field() }}



			<div class="form-group pt-2 pl-2 pr-2">
				 <label class="col-form-label" for="formGroupExampleInput2">Course Name</label> 
				{{-- <input type="text" name="course" class="form-control" id="formGroupExampleInput2" placeholder="example:SWE111" required> --}}
				<select name="course_id" class="form-control">
					@foreach ($courses as $course)
					<option name="course_id" value="{{$course->id}}">{{$course->cname}}</option>
					@endforeach

				</select>
			</div>
			<div class="form-group pt-1 pl-2 pr-2">
				<label class="col-form-label" for="formGroupExampleInput2">Number Of Question</label>
				<input type="text" name="question_length" class="form-control" id="formGroupExampleInput2"
					placeholder="E.g 10" required>
			</div>
			<div class="form-group pt-1 pl-2 pr-2">
				<label class="col-form-label" for="formGroupExampleInput2">Set time</label>
				<input type="text" name="time" class="form-control" id="formGroupExampleInput2"
					placeholder="Enter In Minutes" required>
			</div>
			<div class="form-group pt-1 pl-2 pr-2">
				<input type="hidden"
					value="{{substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", 5)), 0, 5)}}"
					name="uniqueid" class="form-control" id="formGroupExampleInput2">
			</div>
			<div class="sub pt-1 pb-3">
			<button type="Submit" class="btn btn-success btn-block">Submit</button>
			</div>


		</form>
	</div>
</div>

@endsection