import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
   /* server: {
        host: '0.0.0.0', // Escucha en todas las interfaces de red
        port: 5173,      // Puerto en el que se ejecuta Vite
        strictPort: true,
        proxy: {
            '/@vite': 'http://localhost:5173', // Proxy para los activos de Vite
        },
    },*/
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/scss/app.scss', 
                'resources/js/app.js',
                'resources/tidelib/css/cargar_obra.css',
                'resources/tidelib/css/contacto.css',
                'resources/tidelib/css/correctores.css',
                'resources/tidelib/css/correo.css',
                'resources/tidelib/css/editoriales.css',
                'resources/tidelib/css/estilo.css',
                'resources/tidelib/css/formulario_corrector.css',
                'resources/tidelib/css/genero.css',
                'resources/tidelib/css/generos_2.css',
                'resources/tidelib/css/intercambio.css',
                'resources/tidelib/css/lateral_2.css',
                'resources/tidelib/css/lateral.css',
                'resources/tidelib/css/menu_perfil.css',
                'resources/tidelib/css/patrocinar_obra.css',
                'resources/tidelib/css/perfil_descripcion.css',     
                'resources/tidelib/css/perfil_patrocinio.css', 
                'resources/tidelib/css/portadas.css',
                'resources/tidelib/css/screen_advertencia.css',   
                'resources/tidelib/css/video.css', 
                'resources/tidelib/css/vision_ovjetivo.css',
                'resources/tidelib/js/carousel.js'  
            ],
            refresh: true,
        }),
    ],
});
