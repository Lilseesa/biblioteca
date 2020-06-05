@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>@lang('Autores registrados')</h2>

        @if(Auth::check() && Auth::user()->hasAnyRole(['admin']))
            <a href="{{route('autores.create')}}">Registrar Autor</a>
        @endif
        
        <div class="row">

            @foreach ($autores as $autor)
                <div class="col-4">
                    <div class="card">
                        <img src=" {{url($autor->avatar)}}" class="card-img-top" alt="{{$autor->nombre}}">
                        
                        <div class="card-body">
                            <h5 class="card-title">{{$autor->Nombre}} {{$autor->apellidos}}</h5>
                            <a href="{{ route('autores.show', $autor) }}" class="btn btn-primary"> Ver mas</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection