@extends('layouts.master')
@section('title')
    EDIT BOOK
@endsection
@section('content')
<div>
    <h2>Edit Data</h2>
        <form action="/book/{{$book->id}}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-group">
                <label for="title" class="form-label">Book Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Masukkan Title" value="{{$book->title}}">
                @error('title')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="summary" class="form-label">Summary</label>
                <textarea name="summary" id="summary" class="form-control" cols="30" rows="10">{{$book->summary}}</textarea>
                @error('summary')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @error('image')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" name="stok" id="stok" class="form-control" value="{{$book->stok}}">
                @error('stok')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="genre_id" class="form-label">Genre</label>
                <select name="genre_id" id="genre_id" class="form-control">
                    <option value="">--Pilih Genre--</option>
                    @forelse ($genre as $item)
                    @if ($item->id === $book->genre_id)
                    <option value="{{$item->id}}" selected>{{$item->name}}</option>
                    @else
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endif
                        
                    @empty
                        <option value="">Tidak ada Genre</option>
                    @endforelse
                </select>
                @error('stok')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
@endsection