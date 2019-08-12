@extends('main')

@section('content')

<h1>Confirm Delete</h1>

<div class="w3-card w3-card-2 w3-yellow w3-container"
        style="padding: 20px; width: 400px; margin: 0 auto">
    Are you sure you want to delete this user?<br>
    {{$user->name}}
    <form action="{{url('/users/' . $user->id . '/confirm')}}" method="post">
        {{csrf_field()}}
        <input type="hidden" name="user_id" value="{{$user->id}}">
        <a href="{{url('/users/' . $user->id)}}" class="w3-button w3-green">No - Cancel</a>
        <button class="w3-button w3-red w3-hover-orange w3-right">Yes - Delete</button>
    </form>
</div>
@stop
