@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>@lang('Editar autor')</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <x-autor-form
            method="PUT"
            action="{{ route('autores.update', $autor) }}"
            btnText="{{ __('Actualizar autor') }}"
            :autor="$autor"
        ></x-autor-form>

    </div>

@endsection