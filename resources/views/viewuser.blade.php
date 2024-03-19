@extends('layout')
@section('title')
    View Users Data
@endsection

@section('content')
<table class="table table-striped table-bordered">
    <tr>
        <th width="80px">Name :</th>
        <td>{{$user->name}}</td>
    </tr>
    <tr>
        <th width="80px">Email :</th>
        <td>{{ $user->email}}</td>
    </tr>
    <tr>
        <th width="80px">Age :</th>
        <td>{{ $user->age}}</td>
    </tr>
    <tr>
        <th width="80px">City :</th>
        <td>{{$user->city}}</td>
    </tr>
</table>
<a href="{{ route('user.index')}}" class="btn btn-danger">Back</a>
@endsection