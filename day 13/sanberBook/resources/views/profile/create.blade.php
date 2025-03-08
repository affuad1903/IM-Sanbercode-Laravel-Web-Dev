@extends('layouts.master')
@section('title')
    CREATE PROFILE
@endsection
@section('content')
<form action="/profile" method="POST">
    @csrf
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" class="form-control" name="age" id="age" placeholder="Masukkan Umur">
        @error('age')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="address">Address</label>
        <textarea name="address" id="address" class="form-control" cols="30" rows="10"></textarea>
        @error('address')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Tambah</button>
</form>
@endsection