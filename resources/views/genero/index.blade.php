@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>@lang('Género')</h2>

        <a href="{{route('generos.create')}}">Insertar genero</a>

        <div class="row">

            @foreach ($generos as $genero)
                <div class="col-4">
                    <div class="card" >
                        <div class="card-body">
                            <h5 class="card-title">{{$genero->nombre}}</h5>

                            <a href="{{ route('generos.show', $genero) }}" type="button" class="btn btn-link">Ver</a>

                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

@endsection