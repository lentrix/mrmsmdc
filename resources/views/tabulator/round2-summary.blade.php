@extends('main')

@section('content')

<h1>Round 2 Summary</h1>

<div class="w3-card w3-pale-blue">
    <div class="w3-container w3-blue">
        <h3>Mr. MDC</h3>
    </div>
    <div class="w3-container">
        <table class="summary-table">
            <thead>
                <tr>
                    <th rowspan="2">Candidates</th>
                    @foreach($judges as $judge)
                        <th colspan="3">{{$judge->name}}</th>
                    @endforeach
                    <th rowspan="2">Average</th>
                    <th rowspan="2">Rank</th>
                </tr>
                <tr>
                    @foreach($judges as $judge)
                        <th>Beauty</th>
                        <th>Brains</th>
                        <th>TOTAL</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($male as $c)
                <?php $rank = $c->round2Rank(); ?>
                <tr @if($rank==1) class="qualifier" @endif>
                    <td>{{$c->name}}</td>
                    <?php $sum = 0; ?>
                    @foreach($judges as $judge)

                    <td class="computed">{{\App\Score::get($c->id, $judge->id, 'beauty')}}</td>
                    <td class="computed">{{\App\Score::get($c->id, $judge->id, 'brain')}}</td>
                    <td class="computed">{{$c->computeRound2Judge($judge->id)}}</td>

                    @endforeach

                    <td class="computed">{{number_format($c->computeRound2Average(),2)}}</td>
                    <td class="computed">{{$rank}}</td>
                </tr>

                @endforeach

            </tbody>

        </table>
    </div>
</div>

<div class="w3-container">&nbsp;</div>

<div class="w3-card w3-pale-blue">
        <div class="w3-container w3-blue">
            <h3>Ms. MDC</h3>
        </div>
        <div class="w3-container">
            <table class="summary-table">
                <thead>
                    <tr>
                        <th rowspan="2">Candidates</th>
                        @foreach($judges as $judge)
                            <th colspan="3">{{$judge->name}}</th>
                        @endforeach
                        <th rowspan="2">Average</th>
                        <th rowspan="2">Rank</th>
                    </tr>
                    <tr>
                        @foreach($judges as $judge)
                            <th>Beauty</th>
                            <th>Brains</th>
                            <th>TOTAL</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($female as $c)
                    <?php $rank = $c->round2Rank(); ?>
                    <tr @if($rank==1) class="qualifier" @endif>
                        <td>{{$c->name}}</td>
                        <?php $sum = 0; ?>
                        @foreach($judges as $judge)

                        <td class="computed">{{\App\Score::get($c->id, $judge->id, 'beauty')}}</td>
                        <td class="computed">{{\App\Score::get($c->id, $judge->id, 'brain')}}</td>
                        <td class="computed">{{$c->computeRound2Judge($judge->id)}}</td>

                        @endforeach

                        <td class="computed">{{number_format($c->computeRound2Average(),2)}}</td>
                        <td class="computed">{{$rank}}</td>
                    </tr>

                    @endforeach

                </tbody>

            </table>
        </div>
    </div>

@if(auth()->user()->role=="admin")
<div class="w3-row" style="padding: 20px 0;">
    <a href="{{url('/init-round2')}}" class="w3-button w3-teal w3-hover-blue">Initiate Round 2</a>
</div>
@endif

<div class="w3-container">&nbsp;</div>

@stop
