@extends('main')

@section('content')

<form action="{{url('/round2')}}" method="post">
    {{csrf_field()}}
    <input type="hidden" name="judge_id" value="{{auth()->user()->id}}">
    <button type="submit" class="w3-button w3-teal w3-xlarge w3-right w3-hover-blue">Submit Scores</button>
    <h1>Round 2</h1>
    <div class="candidates-list">

        <div class="candidates-list-block">
            <span style="float: right; color: #799;font-style: italic">(Note: Scores are from 1 to 50 without fractional values.)</span>
            <h3>Mr. MDC</h3>
            @foreach(\App\Candidate::where(['finalist'=>1,'category'=>'Mr.'])->get() as $candidate)
                @include('candidates.round2-scoring')
            @endforeach
        </div>

        <div class="candidates-list-block">
                <span style="float: right; color: #799;font-style: italic">(Note: Scores are from 1 to 50 without fractional values.)</span>
                <h3>Ms. MDC</h3>
                @foreach(\App\Candidate::where(['finalist'=>1,'category'=>'Ms.'])->get() as $candidate)
                    @include('candidates.round2-scoring')
                @endforeach
        </div>

    </div>

    <div class="w3-row" style="padding: 16px 0;">
        <button type="submit" class="w3-button w3-teal w3-xlarge w3-right w3-hover-blue">Submit Scores</button>
    </div>
</form>

<div class="w3-container">&nbsp;</div>
@stop

@section('scripts')

<script>
$(document).ready(function(){
    $(".candidates-list-block input").change(function(){
        if($(this).val()>50) $(this).val(50);
        if($(this).val()<0) $(this).val(0);
    })
})
</script>

@stop
