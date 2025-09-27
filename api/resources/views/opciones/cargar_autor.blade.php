<div class="banner_notificaciones">
      <div class="encabezado">Carga tu obra, sé parte de Tídelib</div>
    </div>

<form class="cbp-mc-form" action="/cargar_autor" method="post" enctype="multipart/form-data">
    @csrf
    <div class="cbp-mc-column">
     <div class="socalo_editorial"> Alta como Autor</div>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" required>
    
            <label for="apellido">Apellido</label>
            <input type="text" id="apellido" name="apellido" placeholder="Ingrese su Apellido" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ Auth::user()->email }}" readonly required>
    
            <label for="nacionalidad">Nacionalidad</label>
            <input type="text" id="nacionalidad" name="nacionalidad" placeholder="Ingrese su Nacionalidad" required>
      </div>
      <input class="cbp-mc-submit" type="submit" value="Carga tus datos" />
  </div>
</form>
