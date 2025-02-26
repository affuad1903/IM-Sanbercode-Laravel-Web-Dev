@extends('layouts.master')
@section('title')
    HOME
@endsection
@section('content')
<header><h1>SanberBook</h1></header>
<section id="introSanberBook">
    <article>
        <h2>Social Media Developer Santai Berkualitas</h2>
        <p>Belajar dan Berbagi agar hidup ini semakin santai berkualitas</p>
    </article>
</section>
<section id="benefitSanberBook">
    <article>
        <h2>Benefit Join di SanberBook</h2>
        <ul>
            <li>Mendapatkan motivasi dari sesama developer</li>
            <li>Sharing knowledge dari para mastah Sanber</li>
            <li>Dibuat oleh calon web developer terbaik</li>
        </ul>
    </article>
</section>
<section id="joinSanberBook">
    <article>
        <h2>Cara Bergabung ke SanberBook</h2>
        <ol>
            <li>Mengunjungi Website ini</li>
            <li>Mendaftar di <a href="{{url('/register')}}">Form Sign Up</a></li>
            <li>Selesai!</li>
        </ol>
    </article>
</section>
@endsection
