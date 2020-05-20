@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>@lang('Aca van a ir todos los libros')</h2>

        <a href="{{route('libros.create')}}">Insertar libro</a>
        
        <div class="row">

            @foreach ($libros as $libro)
                <div class="col-4">
                    <div class="card">
                        <img src=" url({{$libro->portada}})" class="card-img-top" alt="{{$libro->titulo}}">
                        
                        <div class="card-body">
                            <h5 class="card-title">{{$libro->titulo}}</h5>
                            <a href="{{ route('libros.show', $libro) }}" class="btn btn-primary"> Ver mas</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection