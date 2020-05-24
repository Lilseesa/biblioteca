@extends('layouts.app')

@section('content')

    <div class="container">

        <a href="{{route('generos.index')}}">&larr; Género</a>

        <h2>{{$genero->nombre}}</h2>

        <div class="btn-group" role="group" >
            <a href="{{ route('generos.edit', $genero) }}" type="button" class="btn btn-success">Editar</a>
            <button type="button" class="btn btn-danger">Eliminar</button>
        </div>

    </div>

@endsection