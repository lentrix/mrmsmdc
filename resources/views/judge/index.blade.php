@extends('main')

@section('content')

@if(env('ROUND')==1)
    @include('judge.round1');
@else
    @include('judge.round2');
@endif

@stop
