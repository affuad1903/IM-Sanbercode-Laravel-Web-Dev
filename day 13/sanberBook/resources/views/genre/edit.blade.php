@extends('layouts.master')
@section('title')
    GENRE EDIT
@endsection
@section('content')
<div>
    <h2>Edit Genre {{$genre->id}}</h2>
    <form action="/genre/{{$genre->id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{$genre->name}}" id="name" placeholder="Masukkan Name">
            @error('name')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description"  value="{{$genre->description}}"  id="description" placeholder="Masukkan Description">
            @error('description')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
</div>
@endsection