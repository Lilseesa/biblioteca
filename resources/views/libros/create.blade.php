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

        <form method="POST" action="{{ route('libros.store') }}" enctype="multipart/form-data">

        @csrf

            <div class="form-group">
                <label for="Titulo">@lang("Titulo")</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{old('titulo')}}">            
            </div>

            <div class="form-group">
                <label for="isbn">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" value="{{old('isbn')}}">            
            </div>

            <div class="form-group">
                <label for="Resumen">@lang('Resumen')</label>
                <textarea type="text" class="form-control" id="resumen" name="resumen" cols="20" rows="5">{{old('resumen')}}</textarea>          
            </div>

            <div class="custom-file mb-5">
                <input type="file" class="custom-file-input" id="portada" name="portada">
                <label class="custom-file-label" for="portada">@lang('Elija la portada')</label>
            </div>
        
            <button type="submit" class="btn btn-primary">@lang('Insertar libro')</button>
        </form>   
    </div>

@endsection