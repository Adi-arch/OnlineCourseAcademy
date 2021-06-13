@extends('dashboard/instructor/home')

@section('content')
<div class="container index">
<hr class="mt-5">
<div class="col-md-6 col-lg-6 col-sm-6 col-lg-offset-4" style="width:550px;font-weight:bold;">
	 <h2 style="color: green">Your Question Set is complete</h2>
	  <!-- Trigger the modal with a button -->
	  <h2>Please Remember your Exam Code : <span style="color: red;font-size: 40px; font-weight: bold;">{{$uniqueid}}</span></h2>
	  <a href="{{route('instructor.createQuiz')}}"><button type="button" class="btn btn-info btn-lg btn-block"> Back To Create Quiz </button></a><br>
	  <form action="/makequestion/{{$uniqueid}}/edit" method="get">
	  	{{ csrf_field() }}
	  	<input type="hidden" name="uniqueid" value="{{$uniqueid}}">
	  	<button type="submit" class="btn btn-info btn-lg btn-block">Review Questions</button>
	  </form>
  </div>

</div>
@endsection