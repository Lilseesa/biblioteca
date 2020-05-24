<div>
    <form method="POST" action="{{ $action }}" enctype="multipart/form-data">

    @csrf
    
    @method($method)

        <div class="form-group">
            <label for="Nombre">@lang("Nombre")</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $autor !== null? $autor['Nombre'] : old('nombre')}}">            
        </div>

        <div class="form-group">
            <label for="Apellidos">Apellidos</label>
            <input type="text" class="form-control" id="apellidos" name="apellidos" value="{{ $autor !== null? $autor['apellidos'] : old('apellidos')}}">            
        </div>

        <div class="form-group">
            <label for="Biografia">@lang('Biografia')</label>
            <textarea type="text" class="form-control" id="biografia" name="biografia" cols="20" rows="5">{{ $autor !== null? $autor['biografia'] : old('biografia')}}</textarea>          
        </div>

        <div class="form-group">
            <label for="Pais">Pais</label>
            <input type="text" class="form-control" id="pais" name="pais" value="{{ $autor !== null? $autor['pais'] : old('pais')}}">            
        </div>

        {{-- Nombre de la ruta entre parentesis  --}}
        @if (Route::is('autores.edit'))
            <img src="{{ url($autor->avatar) }}" class="img-thumbnail mb-4" alt="{{$autor->nombre}}">
        @endif

        <div class="custom-file mb-5">
            <input type="file" class="custom-file-input" id="avatar" name="avatar">
            <label class="custom-file-label" for="customFile">@lang('Elija su avatar')</label>
        </div>

        <button type="submit" class="btn btn-primary">{{$btnText}}</button>
    </form>
</div>