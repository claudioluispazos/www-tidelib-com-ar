<template>
    <div class="book-showcase">
        <!-- Imagen principal del libro -->
        <div class="book-image-section">
            <div class="book-image-container">
                <div class="book-image">
                    <img 
                        v-if="libroStore.featuredLibro?.imagen_portada" 
                        :src="libroStore.featuredLibro.imagen_portada" 
                        :alt="libroStore.featuredLibro.titulo"
                        class="book-cover"
                    />
                    <div v-else class="placeholder-book-image">
                        <v-icon name="bi-book" scale="4" />
                        <p>{{ libroStore.featuredLibro?.titulo || 'Libro destacado' }}</p>
                    </div>
                </div>
            </div>
            
            <!-- Texto promocional -->
            <div class="promotional-text">
                <p v-if="libroStore.featuredLibro?.sinopsis">
                    {{ libroStore.featuredLibro.sinopsis }}
                </p>
                <p v-else>
                    Aquí, algún tipo de comentario promocional sobre este increíble libro que te transportará a mundos fantásticos llenos de aventuras y emociones.
                </p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted } from 'vue'
import { useLibroStore } from '../../store/generoLibroStore'

const libroStore = useLibroStore()

onMounted(() => {
    libroStore.fetchFeaturedLibro()
})
</script>

<style scoped>
.book-showcase {
    margin-top: 70px; /* Altura del header */
    margin-left: 20%; /* Ancho del sidebar izquierdo */
    margin-right: 20%; /* Ancho del sidebar derecho */
    padding: 0; /* Sin padding para que la imagen ocupe todo el ancho */
    background-color: #fff;
    min-height: calc(100vh - 70px);
}

.book-image-section {
    display: flex;
    flex-direction: column;
    gap: 30px;
}

.book-image-container {
    width: 100%;
    position: relative;
}

.book-image {
    width: 100%;
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}

.book-cover {
    width: 100%;
    height: auto;
    object-fit: contain; /* Mantiene la proporción original de la imagen */
    object-position: center;
}

.placeholder-book-image {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #fff;
    text-align: center;
}

.placeholder-book-image p {
    margin-top: 15px;
    font-size: 16px;
    font-weight: 500;
}


.promotional-text {
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
    padding: 0 40px;
}

.promotional-text p {
    font-size: 16px;
    line-height: 1.6;
    color: #333;
    margin: 0;
    padding: 20px;
    background-color: #f8f9fa;
    border-radius: 8px;
    border-left: 4px solid #e60000;
}

/* Responsive */
@media screen and (max-width: 1024px) {
    .book-showcase {
        margin-left: 25%;
        margin-right: 25%;
    }
}

@media screen and (max-width: 768px) {
    .book-showcase {
        margin-left: 30%;
        margin-right: 30%;
    }
    
    .promotional-text {
        padding: 0 20px;
    }
    
    .promotional-text p {
        font-size: 14px;
        padding: 15px;
    }
}

@media screen and (max-width: 480px) {
    .book-showcase {
        margin-left: 0;
        margin-right: 0;
    }
    
    
    .promotional-text {
        padding: 0 15px;
    }
    
    .logo-text {
        font-size: 14px;
    }
    
    .vividl-logo {
        bottom: 10px;
        left: 10px;
        padding: 4px 8px;
    }
}
</style>