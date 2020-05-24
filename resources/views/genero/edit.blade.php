@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>@lang('Editar género')</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <x-genero-form
            :genero="$genero"
            route="{{ route('generos.update', $genero) }}"
            method="PUT"
            action="{{__('Editar género')}}"
        ></x-genero-form>


    </div>

@endsection