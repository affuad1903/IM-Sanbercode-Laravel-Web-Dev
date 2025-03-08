@extends('layouts.master')
@section('title')
    HOME
@endsection
@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('noAdmin'))
    <div class="alert alert-danger">
        {{ session('noAdmin') }}
    </div>
@endif
<header><h1>SanberBook</h1></header>
@auth
    <h2>Selamat Datang {{Auth()->user()->name}} </h2>

    @if (Auth()->user()->profile)
    ({{Auth()->user()->profile->age}} Tahun)
    @else
        
    @endif
@endauth
@endsection
