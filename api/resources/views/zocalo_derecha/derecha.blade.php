<div class="derecha">
@foreach($zocalo_data as $libro)
  @if ($libro->patrocinado)
    @include('patrocinio.tarjeta_patrocinio', ['libro' => $libro ])
  @else
    @include('perfil.tarjeta_perfil', ['libro' => $libro ])
  @endif
@endforeach
</div>