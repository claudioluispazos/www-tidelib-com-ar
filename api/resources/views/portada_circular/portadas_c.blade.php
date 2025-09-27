<div class="lateral">
                <div class="encabezado_los_mas_leido">Los más leidos</div>
                @foreach ($portadas_c_data as $libro)
                  <div class="bloque_perfil_lateral">
                  <a href="/perfil_descripcion/{{ $libro->id }}">
                    <img src="img/{{ $libro->imagen_portada }}" id="portada_lateral"></a>
                    <div class="titulo_lateral">{{ $libro->titulo }}</div>
                  </div>   
                  @endforeach
          </div>