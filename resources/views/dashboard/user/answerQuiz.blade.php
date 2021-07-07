@extends('dashboard/user/parent')



@section('content')
<div class="container courseVideos">
    <hr class="mt-6">
    @foreach($questions as $question)
    <div class="col-md-6 col-lg-8 col-sm-6 col-lg-offset-2">
        <form method="post" action="{{route('user.storeQuizAns')}}" class="ansform">
            {{ csrf_field() }}
            <h3>{{$question->question}} ?</h3>
            <div class="col-lg-offset-1">
                <input type="hidden" name="question" value="{{$question->question}}">
                <input type="hidden" name="true_answer" value="{{$question->answer}}">
                <input name="answer" value="{{$question->choice1}}" type="radio"> {{$question->choice1}} <br>
                <input name="answer" value="{{$question->choice2}}" type="radio">{{$question->choice2}}<br>
                <input name="answer" value="{{$question->choice3}}" type="radio">{{$question->choice3}}<br>
                <input name="answer" value="{{$question->choice4}}" type="radio">{{$question->choice4}}<br>
                <input type="submit" name="submit" value="submit" class="btn btn-primary" id="submitbtn">
            </div>
        </form>
    </div>
    @endforeach
</div>
<script type="text/javascript">
    var timeoutHandle;
function countdown(minutes) {
    var seconds = 60;
    var mins = minutes
    function tick() {
        var counter = document.getElementById("timer");
        var current_minutes = mins-1
        seconds--;
        counter.innerHTML =
        current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
        if( seconds > 0 ) {
            timeoutHandle=setTimeout(tick, 1000);
        } else {

            if(mins > 1){

               // countdown(mins-1);   never reach “00″ issue solved:Contributed by Victor Streithorst
               setTimeout(function () { countdown(mins - 1); }, 1000);

            }
        }
    }
    tick();
}

countdown('<?php echo $time; ?>');

</script>
<!-- script for disable url -->
<script type="text/javascript">
    var time= '<?php echo $time; ?>';
        var realtime = time*60000;
        setTimeout(function () {
            alert('Time Out');
            window.location.href= '/';},
       realtime);
    
        
</script>
@endsection