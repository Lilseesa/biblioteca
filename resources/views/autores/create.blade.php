@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>{{__('Insertar autor')}}</h2>   

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
        method="POST" 
        action="{{ route('autores.store') }}"
        btnText="{{ __('Insertar autor') }}"
        :autor="null"
        ></x-autor-form>
    </div>

@endsection