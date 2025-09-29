<template>
    <div class="debug-home">
        <h1>Debug - Tidelib</h1>
        
        <div class="debug-section">
            <h2>Estado del Store</h2>
            <p>Géneros cargados: {{ generoStore.generos.length }}</p>
            <p>Libros cargados: {{ libroStore.libros.length }}</p>
            <p>Libro destacado: {{ libroStore.featuredLibro ? libroStore.featuredLibro.titulo : 'Ninguno' }}</p>
            <p>Loading géneros: {{ generoStore.loading }}</p>
            <p>Loading libros: {{ libroStore.loading }}</p>
            <p>Error géneros: {{ generoStore.error }}</p>
            <p>Error libros: {{ libroStore.error }}</p>
        </div>

        <div class="debug-section">
            <h2>Acciones</h2>
            <button @click="loadGeneros" :disabled="generoStore.loading">
                {{ generoStore.loading ? 'Cargando...' : 'Cargar Géneros' }}
            </button>
            <button @click="loadLibros" :disabled="libroStore.loading">
                {{ libroStore.loading ? 'Cargando...' : 'Cargar Libros' }}
            </button>
            <button @click="loadFeaturedLibro" :disabled="libroStore.loading">
                {{ libroStore.loading ? 'Cargando...' : 'Cargar Libro Destacado' }}
            </button>
        </div>

        <div class="debug-section" v-if="generoStore.generos.length > 0">
            <h2>Géneros</h2>
            <ul>
                <li v-for="genero in generoStore.generos" :key="genero.id">
                    {{ genero.nombre }}
                </li>
            </ul>
        </div>

        <div class="debug-section" v-if="libroStore.libros.length > 0">
            <h2>Libros</h2>
            <ul>
                <li v-for="libro in libroStore.libros" :key="libro.id">
                    {{ libro.titulo }} - {{ libro.autor?.nombre }}
                </li>
            </ul>
        </div>

        <div class="debug-section" v-if="libroStore.featuredLibro">
            <h2>Libro Destacado</h2>
            <p><strong>Título:</strong> {{ libroStore.featuredLibro.titulo }}</p>
            <p><strong>Autor:</strong> {{ libroStore.featuredLibro.autor?.nombre }} {{ libroStore.featuredLibro.autor?.apellido }}</p>
            <p><strong>Precio:</strong> ARS $ {{ formatPrice(libroStore.featuredLibro.precio) }}</p>
            <p><strong>Género:</strong> {{ libroStore.featuredLibro.genero?.nombre }}</p>
        </div>
    </div>
</template>

<script setup>
import { onMounted } from 'vue'
import { useGeneroStore, useLibroStore } from '../store/generoLibroStore'

const generoStore = useGeneroStore()
const libroStore = useLibroStore()

const loadGeneros = async () => {
    await generoStore.fetchGeneros()
}

const loadLibros = async () => {
    await libroStore.fetchLibros()
}

const loadFeaturedLibro = async () => {
    await libroStore.fetchFeaturedLibro()
}

const formatPrice = (price) => {
    if (!price) return '0'
    return new Intl.NumberFormat('es-AR').format(price)
}

onMounted(() => {
    console.log('Debug Home mounted')
    console.log('Genero Store:', generoStore)
    console.log('Libro Store:', libroStore)
})
</script>

<style scoped>
.debug-home {
    padding: 40px;
    max-width: 1000px;
    margin: 0 auto;
    font-family: Arial, sans-serif;
}

.debug-section {
    margin-bottom: 30px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #f9f9f9;
}

button {
    background-color: #e60000;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    margin-right: 10px;
    margin-bottom: 10px;
}

button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    padding: 5px 0;
    border-bottom: 1px solid #eee;
}

h1, h2 {
    color: #333;
}

p {
    margin: 5px 0;
}
</style>
