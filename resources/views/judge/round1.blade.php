@extends('main')


@section('content')

<form method="post" action="{{url('/round1')}}">
    {{csrf_field()}}
    <input type="hidden" name="judge_id" value="{{auth()->user()->id}}">
    <button type="submit" class="w3-button w3-teal w3-xlarge w3-right w3-hover-blue">Submit Scores</button>
    <h1>Round 1 Scoring</h1>
    <div class="candidates-list">
        <div class="candidates-list-block">
                <span style="float: right; color: #799;font-style: italic">(Note: Scores are from 1 to 10 without fractional values.)</span>
            <h3>Mr. MDC</h3>
            @foreach(\App\Candidate::listByCategory('Mr.') as $candidate)
                @include('candidates.round1-scoring')
            @endforeach
        </div>
        <div class="candidates-list-block">
                <span style="float: right; color: #799;font-style: italic">(Note: Scores are from 1 to 10 without fractional values.)</span>
            <h3>Miss MDC</h3>
            @foreach(\App\Candidate::listByCategory('Ms.') as $candidate)
                @include('candidates.round1-scoring')
            @endforeach
        </div>
    </div>
    <div class="w3-row" style="padding: 16px 0;">
    <button type="submit" class="w3-button w3-teal w3-xlarge w3-right w3-hover-blue">Submit Scores</button>
    </div>
</form>
@stop

@section('scripts')

<script>
$(document).ready(function(){
    $(".candidates-list-block input").change(function(){
        if($(this).val()>10) $(this).val(10);
        if($(this).val()<0) $(this).val(0);
    })
})
</script>

@stop
