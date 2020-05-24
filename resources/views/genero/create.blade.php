@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>@lang('Insertar género')</h2>

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
            :genero="null"
            route="{{route('generos.store')}}"
            method="POST"
            action="{{__('Insertar género')}}"
        ></x-genero-form>

    </div>

@endsection