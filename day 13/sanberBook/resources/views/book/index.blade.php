@extends('layouts.master')
@section('title')
    List Buku
@endsection
@section('content')
@auth
@if (Auth()->user()->role === 'admin')
<a href="{{url('/book/create')}}" class="btn btn-primary my-3">Tambah</a>
@endif    
@endauth

<div class="row">
    @forelse ($book as $item)
    <div class="col-4">
        <div class="card">
            <img src="{{asset('image/' . $item->image)}}"  height="400px" class="card-img-top" alt="Foto {{$item->title}}">
            <div class="card-body">
              <h5 class="card-title">{{$item->title}}</h5>
              <span class="badge bg-secondary mb-1">{{$item->genres->name}}</span>
              <p class="card-text">{{Str::limit($item->summary,100)}}</p>
              <div class="d-grid gap-2">
                <a href="/book/{{$item->id}}" class="btn btn-info">Detail</a>
              </div>
              @auth
              @if (Auth()->user()->role === 'admin')
              <div class="row mt-1">
                <div class="col">
                  <form action="/book/{{$item->id}}" method="POST" onsubmit="return confirm('are you sure delete data?')" >
                    @csrf
                    @method('DELETE')
                    <div class="col d-grid gap-2">
                      <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                  </form>
                </div>
                <div class="col">
                  <div class="col d-grid gap-2">
                    <a href="/book/{{$item->id}}/edit" class="btn btn-warning">Edit</a>
                  </div>
                </div>
              </div>
              @endif
              @endauth
            </div>
          </div>
    </div>
    @empty
        <h2>Tidak Ada Buku</h2>
    @endforelse
</div>

@endsection