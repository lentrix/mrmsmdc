@extends('main')

@section('content')

<h1>Create User</h1>

<div class="w3-card w3-card-2 w3-light-blue" style="width:400px">

    {{ Form::open(['url'=>'/users', 'method'=>'post', 'class'=>'w3-container']) }}

    <div class="w3-row w3-padding">
        {{Form::label('username','User Name')}}
        {{Form::text('username',null, ['class'=>'w3-input'])}}
    </div>

    <div class="w3-row w3-padding">
        {{Form::label('name', 'Full Name')}}
        {{Form::text('name',null, ['class'=>'w3-input'])}}
    </div>

    <div class="w3-row w3-padding">
        {{Form::label('password')}}
        {{Form::password('password',['class'=>'w3-input'])}}
    </div>

    <div class="w3-row w3-padding">
        {{Form::label('role')}}
        {{Form::select('role',[
            'judge' => 'Judge',
            'tabulator' => 'Tabulator',
            'admin'=>'Administrator',
            ],null, ['class'=>'w3-input', 'placeholder'=>'Select a role'])}}
    </div>

    <div class="w3-row w3-padding">
        <button type="submit" class="w3-button w3-teal w3-hover-blue">Create User</button>
    </div>

    {{ Form::close() }}

</div>

<div class="w3-container">&nbsp;</div>
@stop
