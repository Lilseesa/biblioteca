@extends('layouts.app')

@section('content')

    <div class="container">

        <a href="{{route('libros.index')}}">Libros</a>

        <h2>{{$libro->titulo}}</h2>
        
        <img src="url({{$libro->portada}})" class="card-img-top" alt="{{$libro->titulo}}">

        <p>{{$libro->resumen}}</p>

    </div>
@endsection