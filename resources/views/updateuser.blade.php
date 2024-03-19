@extends('layout')
@section('title')
    Update User Data
@endsection

@section('content')
<form action="{{ route('edit-user', ['id'=>$user->id])}}" method="POST">
    @csrf 
    {{-- @method('PUT') --}}
    <div class="mb-3">
        <label for="username" class="form-label">User Name</label>
        <input type="text" class="form-control" value="{{ $user->name }}" name="username">
        @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="useremail" class="form-label">User Email</label>
        <input type="email" class="form-control" value="{{ $user->email }}" name="useremail">
        @error('useremail')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="userage" class="form-label">User Age</label>
        <input type="number" class="form-control" value="{{ $user->age }}" name="userage">
        @error('userage')
           <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="usercity" class="form-label">User City</label>
        <input type="text" class="form-control" value="{{ $user->city }}" name="usercity">
        @error('usercity')
           <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <input type="submit" value="Submit" class="btn btn-success">
    </div>
</form>    
@endsection