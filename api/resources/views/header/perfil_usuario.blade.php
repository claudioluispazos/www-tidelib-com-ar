<img src="img/mujer.jpg" class="menuperfil" id="menuperfil"/>    
<div class="content_1" id="cont_foto">
    <did class="cont_foto">
            <img src="img/mujer.jpg" id="foto_perfil_usuario"  />
    </did>
    <div class="nombre">{{ Auth::user()->name }}</div>
    <div class="tipo_usuario">{{ Auth::user()->tipo_usuario() }}</div>

    @if (Auth::user()->isAutor())
            <div class="contenedor_autores">
                <select>
                    @foreach(Auth::user()->autors as $key => $autor)
                        <option value="{{ $key }}">{{ $autor->nombre }} {{ $autor->apellido }}</option>
                    @endforeach
                </select>
            <div>
        <div class="estadistica">
            <p><strong class="datos_ventas">Ventas:</strong> <span id="datos_ventas">123</span></p>
            <p><strong class="datos_visitas">Visitas:</strong> <span id="datos_visitas">123</span></p>
            <p><strong class="datos_intercambio">Intercambios:</strong> <span id="datos_intercambio">123</span></p>
            <p><strong class="datos_patrocinio">Patrocinio:</strong> <span id="datos_patrocinio">123</span></p>
        </div>
    @endif    
    <div class="contenedor_botones">
        <button>Cargar Obra</button>
        <form action="/logout" method="post">
            @csrf
            <button type="submit">Cerrar Sesion</button>
        </form>
    </div>
</div>
