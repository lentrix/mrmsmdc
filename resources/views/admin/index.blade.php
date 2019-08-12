@extends('main')

@section('content')

<h1>List of Candidates</h1>

<div class="candidates-list">
    <div class="candidates-list-block">
        <h3>Mr. MDC</h3>
        @foreach(\App\Candidate::listByCategory('Mr.') as $candidate)

            @include('candidates.list-item')

        @endforeach
    </div>
    <div class="candidates-list-block">
        <h3>Miss MDC</h3>
        @foreach(\App\Candidate::listByCategory('Ms.') as $candidate)

            @include('candidates.list-item')

        @endforeach
    </div>
</div>

@stop
