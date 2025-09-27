<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="razon_social" class="form-label">{{ __('Razon Social') }}</label>
            <input type="text" name="razon_social" class="form-control @error('razon_social') is-invalid @enderror" value="{{ old('razon_social', $editorial?->razon_social) }}" id="razon_social" placeholder="Razon Social">
            {!! $errors->first('razon_social', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="denominacion_social" class="form-label">{{ __('Denominacion Social') }}</label>
            <input type="text" name="denominacion_social" class="form-control @error('denominacion_social') is-invalid @enderror" value="{{ old('denominacion_social', $editorial?->denominacion_social) }}" id="denominacion_social" placeholder="Denominacion Social">
            {!! $errors->first('denominacion_social', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="cuit" class="form-label">{{ __('Cuit') }}</label>
            <input type="text" name="cuit" class="form-control @error('cuit') is-invalid @enderror" value="{{ old('cuit', $editorial?->cuit) }}" id="cuit" placeholder="Cuit">
            {!! $errors->first('cuit', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $editorial?->email) }}" id="email" placeholder="Email">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="direccion" class="form-label">{{ __('Direccion') }}</label>
            <input type="text" name="direccion" class="form-control @error('direccion') is-invalid @enderror" value="{{ old('direccion', $editorial?->direccion) }}" id="direccion" placeholder="Direccion">
            {!! $errors->first('direccion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="sitio_web" class="form-label">{{ __('Sitio Web') }}</label>
            <input type="text" name="sitio_web" class="form-control @error('sitio_web') is-invalid @enderror" value="{{ old('sitio_web', $editorial?->sitio_web) }}" id="sitio_web" placeholder="Sitio Web">
            {!! $errors->first('sitio_web', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="facebook" class="form-label">{{ __('Facebook') }}</label>
            <input type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" value="{{ old('facebook', $editorial?->facebook) }}" id="facebook" placeholder="Facebook">
            {!! $errors->first('facebook', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="instagram" class="form-label">{{ __('Instagram') }}</label>
            <input type="text" name="instagram" class="form-control @error('instagram') is-invalid @enderror" value="{{ old('instagram', $editorial?->instagram) }}" id="instagram" placeholder="Instagram">
            {!! $errors->first('instagram', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>