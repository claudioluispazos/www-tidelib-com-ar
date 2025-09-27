@php
  $libro->formato='ebook';
  $libro->tamano='2.56GB';
  $libro->tipografia_mejorada='Activado';
@endphp
<div class="banner_superior"></div>
<div class="contener_principal">
    <div class="conte_1">
        <b class="titulo">{{ $libro->titulo }}</b><br>
        <a class="autor">{{ $libro->autor->nombre }} {{ $libro->autor->apellido }}</a><br>
        <img src="/img/{{ $libro->imagen_portada }}" class="portada"/>
    </div>
    <div class="conte_2">
        <div class="precio">{{ $libro->precio }}</div>
        <img src="/img/carrito_cirtulo_of.png" class="carrito"/>
        <div class="detalle_del_producto">Detalle del Producto</div>
        <div class="isbn"></a>{{ $libro->isbn }}</div>
        <div class="editorial">{{ $libro->editorial->razon_social }}</div>
        <div class="idioma">{{ $libro->idioma }}</div>
        <div class="tamaño">Tamaño: {{ $libro->tamano }}</div>
        <div class="formato">Formato: {{ $libro->formato }}</div>
        <div class="tipografia_mejorada">Tipografía Mejorada: {{ $libro->tipografia_mejorada }}</div>        
    </div>
    <div class="conte conte_3">
        <b class="sinopsis_titulo">SINOPSIS</b><br>
        <a class="sinopsis_texto">En la cima de su carrera política, 
            el gobernador José Sánchez comienza a 
            padecer problemas oníricos; visiones y 
            sueños perturbadores se hacen frecuentes 
            en sus momentos de descansos, y aunque todo eso 
            le empieza a producir serios inconvenientes no lo 
            comparte con nadie, sino hasta verse en un laberinto 
            difícil de escapar, y en efecto, perder la razón. 
            Ilia (de diez años de edad) nieta del gobernador 
            principia los mismos tormentos que su abuelo, 
            Gabriel (hijo del gobernador y padre de la niña) busca 
            ayuda para su hija, acuden a un psiquiatra pero las sesiones 
            con el médico no traen mejoras. Hallar la solución al 
            problema de la pequeña Ilia (o al menos intentarlo) dará 
            una conclusión inesperada, y el sentido a mucha cosas.
            En la cima de su carrera política, 
            el gobernador José Sánchez comienza a 
            padecer problemas oníricos; visiones y 
            sueños perturbadores se hacen frecuentes 
            en sus momentos de descansos, y aunque todo eso 
            le empieza a producir serios inconvenientes no lo 
            comparte con nadie, sino hasta verse en un laberinto 
            difícil de escapar, y en efecto, perder la razón. 
            Ilia (de diez años de edad) nieta del gobernador 
            principia los mismos tormentos que su abuelo, 
            Gabriel (hijo del gobernador y padre de la niña) busca 
            ayuda para su hija, acuden a un psiquiatra pero las sesiones</a>
    </div>
    @if ($libro->autor->biografia)
      <div class="conte conte_4">
          <b class="biografia_titulo">BIOGRAFÍA</b><br>
          <a class="biografia_texto">{{ $libro->autor->biografia->texto }}
            </a>
      </div>
    @endif
</div>
<div class="otras_obras_del_autor">Otras obras del autor</div>
<div class="contenedor_otras_obras">
  @foreach ($libro->autor->obras as $obra)
    @if ($obra->id != $libro->id)
      <div class="">
      <a href="/perfil_descripcion/{{ $obra->id }}"> 
        <img src="/img/{{ $obra->imagen_portada }}" class="portada_otras_obras"/>
      </a>
        <div class="título_otras_obras">{{ $obra->titulo }}</div>
      </div>  
    @endif
  @endforeach
</div>
