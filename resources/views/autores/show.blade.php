@extends('layouts.app')

@section('content')

    <div class="container">

        <a href="{{route('autores.index')}}">Autores</a>

        <h2>{{$autor->nombre}} {{$autor->apellidos}}</h2>
        
        <img src="{{url($autor->avatar)}}" class="card-img-top" alt="{{$autor->nombre}}">

        <p>{{$autor->biografia}}</p>

        <div class="btn-group" role="group" >
            <a href="{{ route('autores.edit', $autor) }}" type="button" class="btn btn-success">Editar</a>
            <button type="button" class="btn btn-danger">Eliminar</button>
        </div>

    </div>
@endsection