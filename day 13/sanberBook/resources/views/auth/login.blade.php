@extends('layouts.master')
@section('title')
    LOGIN
@endsection
@section('content')
<form action="/login" method="POST">
    @csrf
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
    <button type="submit" class="btn btn-primary">Login</button>
</form>
@endsection