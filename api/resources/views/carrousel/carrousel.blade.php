<div class="carrusel">
      <div class="carrusel-list" id="carrusel-list">
        <button class="carrusel-arrow carrusel-prev" id="button-prev" data-button="button-prev" onclick="app.processingButton(event)">
            <img src="img/flecha_izq.png" id="flecha_izq_der" >
        </button>    
        <div class="carrusel-track" id="track">
          @foreach ($carrousel_data as $libro)
            <div class="carrusel-item">
                <a href="/perfil_descripcion/{{ $libro->id }}">
                <picture>
                    <img src="img/{{ $libro->imagen_portada }}">
                </picture>
                </a>
            </div>
          @endforeach
          <!-- Repite el bloque para los otros elementos -->
        </div>
        <button class="carrusel-arrow carrusel-next" id="button-next" data-button="button-next" onclick="app.processingButton(event)">
          <img src="img/flecha_der.png" id="flecha_izq_der" >          
        </button>   
      </div>
    </div>
