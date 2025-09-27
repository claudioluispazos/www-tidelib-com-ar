    <div class="banner_notificaciones">
      <div href="formulario_correctores">Si eres corrector, completa el formulario y crea tu perfil</div>
    </div>
    <form class="cbp-mc-form">
        <div class="cbp-mc-column">
            <label for="first_name">NOMBRE </label>
            <input type="text" id="first_name" name="first_name" placeholder="Juan...">

            <label for="last_name">Apellido</label>
            <input type="text" id="last_name" name="last_n" placeholder="Rodríguez">

            <label for="nacionalidad">Nacionalidad</label>
            <input type="text" id="nacionaliad" name="last_n" placeholder="argentino">

            <label for="edad">Edad</label>
            <input type="text" id="edad" name="last_n" placeholder="34 años">
            
            <label for="profecion">Profeción</label>
            <textarea id="profecion" name="profecion"></textarea>
        </div>

        <div class="cbp-mc-column">
            <label for="phone">Télefono</label>
            <input type="text" id="phone" name="phone" placeholder="+351 999 999">

            <label for="email">Correo</label>
            <input type="text" id="email" name="email" placeholder="jon@doe.com">

            <label for="cat_name">faceboock</label>
            <input type="text" id="faceboock" name="faceboock" placeholder="juan Rodríguez">
          
            <label for="instagram">instagram</label>
            <input type="text" id="instagram" name="instagram" placeholder="@juan.91">

            <label for="x">x</label>
            <input type="text" id="" name="instagram" placeholder="@juan.1991">

            <label for="tik-tok">tik-tok</label>
            <input type="text" id="" name="tik-tok" placeholder="@juan_1991">
        </div>

        <div class="cbp-mc-column">            
            <label for="descripcion">descripción</label>
            <textarea id="descripcion" name="descripcion"></textarea>

            <form action="tu_script.php" method="post" enctype="multipart/form-data">
              <label for="foto">Cargar una foto: (width 140/ height 140)</label>
              <input type="file" id="foto" name="foto" accept="image/*" required>
            </form>
            <div class="cuadro_de_texto">

            </div>
          <div class="cbp-mc-submit-wrap"><input class="cbp-mc-submit" type="submit" 
            value="carga tus datos" /></div>     
        </div>
        </form>
    