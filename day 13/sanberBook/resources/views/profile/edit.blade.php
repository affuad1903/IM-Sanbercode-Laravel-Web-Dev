@extends('layouts.master')
@section('title')
    EDIT PROFILE
@endsection
@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form action="/profile/{{$profile->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" class="form-control" name="age" id="age" value="{{$profile->age}}" placeholder="Masukkan Umur">
        @error('age')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <textarea name="address" id="address" class="form-control" cols="30" rows="10">{{$profile->address}}</textarea>
        @error('address')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection