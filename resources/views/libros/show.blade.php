@extends('layouts.app')

@section('content')

    <div class="container">

        <a href="{{route('libros.index')}}">Libros</a>

        <h2>{{$libro->titulo}}</h2>
        
        <img src="{{url($libro->portada)}}" class="card-img-top" alt="{{$libro->titulo}}">

        <p>{{$libro->resumen}}</p>

        @if(Auth::check() && Auth::user()->hasAnyRole(['admin']))
            <div class="btn-group" role="group" >
                <a href="{{ route('libros.edit', $libro) }}" type="button" class="btn btn-success">Editar</a>
                <button type="button" class="btn btn-danger btn-eliminar-libro" data-id="{{ $libro->id }}">Eliminar</button>
            </div>
        @endif

    </div>
@endsection