@extends('main')

@section('content')

<a href="{{url('/users/create')}}" class="w3-button w3-teal w3-hover-blue w3-right">Create User</a>
<h1>Users List</h1>

<table class="w3-table w3-table-all">
    <thead>
        <tr>
            <th>ID</th>
            <th>User Name</th>
            <th>Full Name</th>
            <th>Role</th>
            <th>...</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->role}}</td>
            <td>
                <a href='{{url("/users/$user->id")}}' class="w3-button w3-tiny w3-teal">...</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="w3-container">&nbsp;</div>
@stop
