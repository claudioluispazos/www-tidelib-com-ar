<template>
    <div class="home-container">
        <!-- Header fijo -->
        <Navbar />
        
        <!-- Sidebar izquierdo -->
        <LeftSidebar />
        
        <!-- Sidebar derecho -->
        <RightSidebar />
        
        <!-- Contenido principal -->
        <div class="main-content">
            <!-- Resultados de búsqueda (si hay búsqueda activa) -->
            <SearchResults v-if="libroStore.libros.length > 0 && isSearchActive" />
            
            <!-- Contenido normal (si no hay búsqueda) -->
            <template v-else>
                <!-- Sección del libro destacado -->
                <HeroBanner />
                
                <!-- Detalles del libro (se revelan al hacer scroll) -->
                <BookDetails />
            </template>
        </div>
    </div>
</template>

<script setup>
import { computed } from 'vue'
import Navbar from '../components/Navbar.vue';
import LeftSidebar from '../components/LeftSidebar.vue';
import RightSidebar from '../components/RightSidebar.vue';
import HeroBanner from '../components/home/HeroBanner.vue';
import BookDetails from '../components/BookDetails.vue';
import SearchResults from '../components/SearchResults.vue';
import { useLibroStore } from '../store/generoLibroStore';

const libroStore = useLibroStore()

// Detectar si hay una búsqueda activa
const isSearchActive = computed(() => {
    return libroStore.libros.length > 0
})
</script>

<style scoped>
.home-container {
    width: 100%;
    min-height: 100vh;
    background-color: #fff;
    position: relative;
}

.main-content {
    margin-left: 20%; /* Ancho del sidebar izquierdo */
    margin-right: 20%; /* Ancho del sidebar derecho */
    margin-top: 70px; /* Altura del header */
    min-height: calc(100vh - 70px);
}

/* Responsive */
@media screen and (max-width: 1024px) {
    .main-content {
        margin-left: 25%;
        margin-right: 25%;
    }
}

@media screen and (max-width: 768px) {
    .main-content {
        margin-left: 30%;
        margin-right: 30%;
    }
}

@media screen and (max-width: 480px) {
    .main-content {
        margin-left: 0;
        margin-right: 0;
    }
}
</style>