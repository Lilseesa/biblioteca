<form method="POST" action="{{ $route }}" enctype="multipart/form-data">
    @csrf

    @method($method)

    <div class="form-group">
        <label for="nombre">@lang("Nombre")</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{$genero !== null ? $genero['nombre'] : old('nombre')}}">
    </div>

    <button type="submit" class="btn btn-primary">{{ $action }}</button>

</form>