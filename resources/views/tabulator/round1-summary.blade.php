<?php use App\Score; ?>

@extends('main')

@section('content')

<h1>Round 1 Summary</h1>

<div class="w3-card w3-pale-blue">
    <div class="w3-card-header w3-blue w3-container">
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

                    <th colspan="5">Summary</th>

                    <th class="vert" rowspan="2">TOTAL</th>
                    <th class="vert" rowspan="2">RANK</th>
                </tr>
                <tr>
                    @foreach($judges as $judge)
                    <th class="vert">Fn</th>
                    <th class="vert">Fr</th>
                    <th class="vert">In</th>
                    @endforeach

                    <th class="vert">Fn</th>
                    <th class="vert">Fr</th>
                    <th class="vert">In</th>
                    <th class="vert">Pf</th>
                    <th class="vert">Pr</th>
                </tr>
            </thead>
            <tbody>
                @foreach($male as $c)
                    <?php $totFanWear = 0; $totInterview = 0; $totFormal = 0; $rank=$c->round1Rank(); ?>
                    <tr @if($rank<4) class="qualifier" @endif>
                        <td width="230">{{$c->no}}.) {{$c->name}}</td>
                        @foreach($judges as $judge)
                            <td class="score-view">{{Score::get($c->id, $judge->id, 'fanwear')}}</td>
                            <td class="score-view">{{Score::get($c->id, $judge->id, 'interview')}}</td>
                            <td class="score-view">{{Score::get($c->id, $judge->id, 'formal')}}</td>
                        @endforeach

                        <td class="computed">{{$totFanWear = Score::total($c->id, 'fanwear')}}</td>
                        <td class="computed">{{$totInterview = Score::total($c->id, 'interview')}}</td>
                        <td class="computed">{{$totFormal = Score::total($c->id, 'formal')}}</td>

                        <td class="score-view">{{$totProf = Score::getOthers($c->id, 'professionalism')}}</td>
                        <td class="score-view">{{$totProd = Score::getOthers($c->id, 'production')}}</td>

                        <td class="computed">{{$total = ($totFanWear + $totInterview + $totFormal + $totProf + $totProd)}}</td>
                        <td class="computed">{{$rank}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="container">&nbsp;</div>

<div class="w3-card w3-pale-blue">
        <div class="w3-card-header w3-blue w3-container">
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

                        <th colspan="5">Summary</th>

                        <th class="vert" rowspan="2">TOTAL</th>
                        <th class="vert" rowspan="2">RANK</th>
                    </tr>
                    <tr>
                        @foreach($judges as $judge)
                        <th class="vert">Fn</th>
                        <th class="vert">Fr</th>
                        <th class="vert">In</th>
                        @endforeach

                        <th class="vert">Fn</th>
                        <th class="vert">Fr</th>
                        <th class="vert">In</th>
                        <th class="vert">Pf</th>
                        <th class="vert">Pr</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($female as $c)
                        <?php $totFanWear = 0; $totInterview = 0; $totFormal = 0; $rank=$c->round1Rank() ?>
                        <tr @if($rank<4) class="qualifier" @endif>
                            <td width="230">{{$c->no}}.) {{$c->name}}</td>
                            @foreach($judges as $judge)
                                <td class="score-view">{{Score::get($c->id, $judge->id, 'fanwear')}}</td>
                                <td class="score-view">{{Score::get($c->id, $judge->id, 'interview')}}</td>
                                <td class="score-view">{{Score::get($c->id, $judge->id, 'formal')}}</td>
                            @endforeach
                            <td class="computed">{{$totFanWear = Score::total($c->id, 'fanwear')}}</td>
                            <td class="computed">{{$totInterview = Score::total($c->id, 'interview')}}</td>
                            <td class="computed">{{$totFormal = Score::total($c->id, 'formal')}}</td>

                            <td class="score-view">{{$totProf = Score::getOthers($c->id, 'professionalism')}}</td>
                            <td class="score-view">{{$totProd = Score::getOthers($c->id, 'production')}}</td>

                            <td class="computed">{{$total = ($totFanWear + $totInterview + $totFormal + $totProf + $totProd)}}</td>
                            <td class="computed">{{$rank}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="container">
        @if(auth()->user()->role=="admin")
            <div class="w3-row" style="padding: 20px 0;">
                <a href="{{url('/init-round2')}}" class="w3-button w3-teal w3-hover-blue">Initiate Round 2</a>
            </div>
        @endif
    </div>
    @stop
