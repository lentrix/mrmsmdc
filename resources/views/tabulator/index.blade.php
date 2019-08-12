@extends('main')

@section('content')

@if(env('ROUND') == 1)

<form method="post" action="{{url('/other-scores')}}">
    {{csrf_field()}}
    <input type="hidden" name="user_id" value="{{auth()->user()->id}}">
    <button type="submit" class="w3-button w3-teal w3-xlarge w3-right w3-hover-blue">Submit Scores</button>
    <h1>Round 1 | Other Scores</h1>
    <div class="candidates-list">
        <div class="candidates-list-block">
            <h3>Mr. MDC</h3>
            @foreach($male as $candidate)
                @include('tabulator.other-scores')
            @endforeach
        </div>
        <div class="candidates-list-block">
            <h3>Miss MDC</h3>
            @foreach($female as $candidate)
                @include('tabulator.other-scores')
            @endforeach
        </div>
    </div>
    <div class="w3-row" style="padding: 16px 0;">
        <button type="submit" class="w3-button w3-teal w3-xlarge w3-right w3-hover-blue">Submit Scores</button>
    </div>

</form>

@else

<h1>Current Stage: Round 2</h1>
<div class="w3-container">
    <strong>Notice:</strong> The Other scores facility is not available in Round 2.
    <br>
    <br>
    <br>
</div>

@endif


@stop
