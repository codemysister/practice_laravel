<!-- untuk merujuk kepada file parent -->
@extends('layout.app')

<!-- untuk menampilkan konten ke parent -->
@section('title')
Halaman About
@endsection
@section('content')
<h1>{{$title}}</h1>
<h1>{{$nama}}</h1>
@endsection