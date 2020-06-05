@extends('layouts.app')

@section('content')

    <div class="container">

        <a href="{{route('autores.index')}}">Autores</a>

        <h2>{{$autor->Nombre}} {{$autor->apellidos}}</h2>
        
        <img src="{{url($autor->avatar)}}" class="card-img-top" alt="{{$autor->nombre}}">

        <p>{{$autor->biografia}}</p>

        @if(Auth::check() && Auth::user()->hasAnyRole(['admin']))
            <div class="btn-group" role="group" >
                <a href="{{ route('autores.edit', $autor) }}" type="button" class="btn btn-success">Editar</a>
                <button type="button" class="btn btn-danger btn-eliminar-autor" data-id="{{ $autor->id }}">Eliminar</button>
            </div>
        @endif
        
    </div>
@endsection