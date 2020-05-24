<div>
    <form method="POST" action="{{ $action }}" enctype="multipart/form-data">

    @csrf

    @method($method)

        <div class="form-group">
            <label for="Titulo">@lang("Titulo")</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $libro != null? $libro['titulo'] : old('titulo')}}">            
        </div>

        <div class="form-group">
            <label for="isbn">ISBN</label>
            <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $libro != null? $libro['isbn'] : old('isbn')}}">            
        </div>

        <div class="form-group">
            <label for="Resumen">@lang('Resumen')</label>
            <textarea type="text" class="form-control" id="resumen" name="resumen" cols="20" rows="5">{{ $libro != null? $libro['titulo'] : old('resumen')}}</textarea>          
        </div>

        {{-- Nombre de la ruta entre parentesis  --}}
        @if (Route::is('libros.edit'))
            <img src="{{ url($libro->portada) }}" class="card-img-top" alt="{{$libro->titulo}}">
        @endif

        <div class="custom-file mb-5">
            <input type="file" class="custom-file-input" id="portada" name="portada">
            <label class="custom-file-label" for="portada">@lang('Elija la portada')</label>
        </div>

        <button type="submit" class="btn btn-primary">{{$btnText}}</button>
    </form>
</div>