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

        <form method="POST" action="{{ route('autores.store') }}" enctype="multipart/form-data">

        @csrf

            <div class="form-group">
                <label for="Nombre">@lang("Nombre")</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{old('nombre')}}">            
            </div>

            <div class="form-group">
                <label for="Apellidos">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{old('apellidos')}}">            
            </div>

            <div class="form-group">
                <label for="Biografia">@lang('Biografia')</label>
                <textarea type="text" class="form-control" id="biografia" name="biografia" cols="20" rows="5">{{old('biografia')}}</textarea>          
            </div>

            <div class="form-group">
                <label for="Pais">Pais</label>
                <input type="text" class="form-control" id="pais" name="pais" value="{{old('pais')}}">            
            </div>

            <div class="custom-file mb-5">
                <input type="file" class="custom-file-input" id="avatar" name="avatar">
                <label class="custom-file-label" for="customFile">@lang('Elija su avatar')</label>
            </div>
        
            <button type="submit" class="btn btn-primary">@lang('Insertar libro')</button>
        </form>   
    </div>

@endsection