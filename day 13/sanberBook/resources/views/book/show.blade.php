@extends('layouts.master')
@section('title')
    Detail Buku
@endsection
@section('content')
<a href="{{url('/book')}}" class="btn btn-info my-3">Kembali</a>
<h1 class="text-dark">{{$book->title}}</h1>
<div class="row">
    <div class="col-7">
        <p class="mt-5"><b>Summary</b></p>
        <p>{{$book->summary}}</p>
        <div class="row">
            <span>Ketersediaan Stok : {{$book->stok}}</span>
        </div>
    </div>
    <div class="col-5 text-center" >
        <div class="row">
            <span>ID BUKU : {{$book->genre_id}}</span>
        </div>
        <img src="{{asset('image/'.$book->image)}}" alt="{{$book->image}}" height="300px" width="250px" >
    </div>
</div>
<hr>
<h4 class="text-center">List Komentar</h4>
<div class="row overflow-scroll mt-2" style="height: 200px">
@forelse ($book->comments as $item)
<div class="card mt-2">
    <h5 class="card-header">{{$item->owner->name}}</h5>
    <div class="card-body">
      <p class="card-text">{{$item->content}}</p>
    </div>
</div>
@empty
    <h5>Tidak Ada Komentar</h5>
@endforelse
</div>

<hr>
@auth
<h3 class="text-center">Buat Komentar</h3>
<form action="/comments/{{$book->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <textarea name="content" id="content" class="form-control" cols="30" rows="10" placeholder="Isi Komentar"></textarea>
        @error('content')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Buat Komentar</button>
</form>
@endauth

@endsection