@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>@lang('Editar libro')</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <x-libro-form
            method="PUT"
            action="{{ route('libros.update', $libro) }}"
            btnText="{{ __('Actualizar libro') }}"
            :libro="$libro"
        ></x-libro-form>

    </div>

@endsection