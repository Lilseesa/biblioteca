@extends('layouts.app')

@section('content')

    <div class="container">

        <a href="{{route('libros.index')}}">Libros</a>

        <h2>{{$libro->titulo}}</h2>
        
        <img src="url({{$libro->portada}})" class="card-img-top" alt="{{$libro->titulo}}">

        <p>{{$libro->resumen}}</p>

        <div class="btn-group" role="group" >
            <a href="{{ route('libros.edit', $libro) }}" type="button" class="btn btn-success">Editar</a>
            <button type="button" class="btn btn-danger">Eliminar</button>
        </div>

    </div>
@endsection