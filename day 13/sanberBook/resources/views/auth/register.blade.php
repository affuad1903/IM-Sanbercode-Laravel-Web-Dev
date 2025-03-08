@extends('layouts.master')
@section('title')
    REGISTER
@endsection
@section('content')
<form action="/register" method="POST">
    @csrf
    <div class="form-group">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama">
        @error('name')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email">
        @error('email')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password">
        @error('password')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirmation" id="password" placeholder="Masukkan Password">
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
@endsection