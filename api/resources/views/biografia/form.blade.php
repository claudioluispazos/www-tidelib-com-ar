<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="autor_id" class="form-label">{{ __('Autor Id') }}</label>
            <input type="text" name="autor_id" class="form-control @error('autor_id') is-invalid @enderror" value="{{ old('autor_id', $biografia?->autor_id) }}" id="autor_id" placeholder="Autor Id">
            {!! $errors->first('autor_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="texto" class="form-label">{{ __('Texto') }}</label>
            <input type="text" name="texto" class="form-control @error('texto') is-invalid @enderror" value="{{ old('texto', $biografia?->texto) }}" id="texto" placeholder="Texto">
            {!! $errors->first('texto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>