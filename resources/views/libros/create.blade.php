@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>{{__('Insertar libro')}}</h2>   

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
        method="POST" 
        action="{{ route('libros.store') }}"
        btnText="{{ __('Insertar libro') }}"
        :libro="null"
        ></x-libro-form>

    </div>

@endsection