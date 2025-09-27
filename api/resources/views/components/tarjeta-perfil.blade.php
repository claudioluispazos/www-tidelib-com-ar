<div class="derecha">
    <div class="content_socalo">
        <div class="portada">
            <a href="{{ route('perfil.descripcion', $libro->id) }}">
                <img src="{{ asset('img/' . $libro->imagen_portada) }}" id="portada"></a>
            </a>
            <div class="carrito_circulo">
                <img src="img/carrito_cirtulo_of.png" alt="">
            </div>
        </div>
        <div class="iconos">
            <div class="col_iconos">
                <img src="img/pizarra_of.png"></img>
                <img src="img/correo_privado.png"></img>
                <img src="img/comentarios.png"></img>
                <img src="img/ojo.png"></img>
                <img src="img/compartir.png"></img>
                <img src="img/intercambio_tidelib.png"></img>
            </div>
        </div>
        <div class="titulo">{{ $libro->titulo }}</div>
        <div class="idioma">({{ $libro->idioma }} )</div>
        <div class="autor">{{ $libro->autor->nombre }} {{ $libro->autor->apellido }}</div>
        <div class="precio">
            <b class="ars">AR$</b>
            <b class="importe">{{ $libro->precio }}</b>
        </div>
        <div class="estrellitas">
            <div class="rating">
                <input type="radio" name="rating1" id="rating1-1" value="1" />
                <label for="rating1-1"><img></label>
                <input type="radio" name="rating1" id="rating1-2" value="2" />
                <label for="rating1-2"><img></label>
                <input type="radio" name="rating1" id="rating1-3" value="3" />
                <label for="rating1-3"><img></label>
                <input type="radio" name="rating1" id="rating1-4" value="4" />
                <label for="rating1-4"><img></label>
                <input type="radio" name="rating1" id="rating1-5" value="5" />
                <label for="rating1-5"><img></label>
            </div>
        </div>
    </div>


</div>