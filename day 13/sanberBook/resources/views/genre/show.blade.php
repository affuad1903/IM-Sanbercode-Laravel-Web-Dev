@extends('layouts.master')
@section('title')
    GENRE SHOW
@endsection
@section('content')
<h2>Show Genre {{$genre->id}}</h2>
<h4>{{$genre->name}}</h4>
<p>{{$genre->description}}</p>
@endsection