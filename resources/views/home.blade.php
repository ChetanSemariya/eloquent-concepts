@extends('layout')
@section('title')
    All Users Data
@endsection

@section('content')
<a href="{{ route('addUser')}}" class="btn btn-success btn-sm mb-3">Add New</a>
<table class="table table-striped table-bordered">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Age</th>
        <th>city</th>
        <th>View</th>
        <th>Delete</th>
        <th>Update</th>
    </tr>
    @foreach($users as $user)
    <tr>
        <td>{{ $user->id}}</td>
        <td>{{ $user->name}}</td>
        <td>{{ $user->email}}</td>
        <td>{{ $user->age}}</td>
        <td>{{ $user->city}}</td>
        <td><a href="{{ route('view-user', ['id' => $user->id]) }}" class="btn btn-primary btn-sm">View</td>
        <td>
            <form action="{{ route('user.destroy', $user->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
            </form>
        </td>
        <td><a href="{{ route('edit-user',['id'=>$user->id])}}" class="btn btn-warning btn-sm">Update</td>
    </tr>
    @endforeach
</table>
<div class="mt-4">
    {{ $users->links()}}
</div>
@endsection