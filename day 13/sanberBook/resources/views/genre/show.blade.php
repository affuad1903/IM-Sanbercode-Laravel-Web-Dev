@extends('layouts.master')
@section('title')
    GENRE SHOW
@endsection
@section('content')

<h2>Show Genre {{$genre->id}}</h2>
<h4>{{$genre->name}}</h4>
<p>{{$genre->description}}</p>
<div class="row">
  <h5 class="d-flex justify-content-center mt-2 mb-3">List Buku</h5>
@forelse ($genre->books as $item)
<div class="col-4">
    <div class="card">
        <img src="{{asset('image/' . $item->image)}}"  height="400px" class="card-img-top" alt="Foto {{$item->title}}">
        <div class="card-body">
          <h5 class="card-title">{{$item->title}}</h5>
          <p class="card-text">{{Str::limit($item->summary,100)}}</p>
          <div class="d-grid gap-2">
            <a href="/book/{{$item->id}}" class="btn btn-info">Detail</a>
          </div>
        </div>
    </div>
</div>
@empty
<h5 class="d-flex justify-content-center mt-5">Tidak Ada List Buku Pada Genre Ini</h5>
@endforelse
</div>
<a href="/genre"><button class="btn btn-primary mt-3">Kembali</button></a>
@endsection