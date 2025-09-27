<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="titulo" class="form-label">{{ __('Titulo') }}</label>
            <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo', $libro?->titulo) }}" id="titulo" placeholder="Titulo">
            {!! $errors->first('titulo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="isbn" class="form-label">{{ __('Isbn') }}</label>
            <input type="text" name="isbn" class="form-control @error('isbn') is-invalid @enderror" value="{{ old('isbn', $libro?->isbn) }}" id="isbn" placeholder="Isbn">
            {!! $errors->first('isbn', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="idioma" class="form-label">{{ __('Idioma') }}</label>
            <input type="text" name="idioma" class="form-control @error('idioma') is-invalid @enderror" value="{{ old('idioma', $libro?->idioma) }}" id="idioma" placeholder="Idioma">
            {!! $errors->first('idioma', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="precio" class="form-label">{{ __('Precio') }}</label>
            <input type="text" name="precio" class="form-control @error('precio') is-invalid @enderror" value="{{ old('precio', $libro?->precio) }}" id="precio" placeholder="Precio">
            {!! $errors->first('precio', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="imagen_portada" class="form-label">{{ __('Imagen Portada') }}</label>
            <input type="text" name="imagen_portada" class="form-control @error('imagen_portada') is-invalid @enderror" value="{{ old('imagen_portada', $libro?->imagen_portada) }}" id="imagen_portada" placeholder="Imagen Portada">
            {!! $errors->first('imagen_portada', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="autor_id" class="form-label">{{ __('Autor Id') }}</label>
            <input type="text" name="autor_id" class="form-control @error('autor_id') is-invalid @enderror" value="{{ old('autor_id', $libro?->autor_id) }}" id="autor_id" placeholder="Autor Id">
            {!! $errors->first('autor_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="genero_id" class="form-label">{{ __('Genero Id') }}</label>
            <input type="text" name="genero_id" class="form-control @error('genero_id') is-invalid @enderror" value="{{ old('genero_id', $libro?->genero_id) }}" id="genero_id" placeholder="Genero Id">
            {!! $errors->first('genero_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="editorial_id" class="form-label">{{ __('Editorial Id') }}</label>
            <input type="text" name="editorial_id" class="form-control @error('editorial_id') is-invalid @enderror" value="{{ old('editorial_id', $libro?->editorial_id) }}" id="editorial_id" placeholder="Editorial Id">
            {!! $errors->first('editorial_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="sinopsis" class="form-label">{{ __('Sinopsis') }}</label>
            <input type="text" name="sinopsis" class="form-control @error('sinopsis') is-invalid @enderror" value="{{ old('sinopsis', $libro?->sinopsis) }}" id="sinopsis" placeholder="Sinopsis">
            {!! $errors->first('sinopsis', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>