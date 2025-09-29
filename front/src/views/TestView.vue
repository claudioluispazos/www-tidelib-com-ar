<template>
    <div class="test-page">
        <h1>Test de Integración API</h1>
        <div class="test-section">
            <h2>Test de Géneros</h2>
            <button @click="testGeneros" :disabled="loading">Cargar Géneros</button>
            <div v-if="loading" class="loading">Cargando...</div>
            <div v-if="error" class="error">Error: {{ error }}</div>
            <div v-if="generos.length > 0" class="success">
                <h3>Géneros cargados:</h3>
                <ul>
                    <li v-for="genero in generos" :key="genero.id">
                        {{ genero.nombre }}
                    </li>
                </ul>
            </div>
        </div>
        
        <div class="test-section">
            <h2>Test de Libros</h2>
            <button @click="testLibros" :disabled="loading">Cargar Libros</button>
            <div v-if="libros.length > 0" class="success">
                <h3>Libros cargados:</h3>
                <ul>
                    <li v-for="libro in libros" :key="libro.id">
                        {{ libro.titulo }} - {{ libro.autor?.nombre }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import generoService from '../services/generoService'
import libroService from '../services/libroService'

const generos = ref([])
const libros = ref([])
const loading = ref(false)
const error = ref(null)

const testGeneros = async () => {
    loading.value = true
    error.value = null
    try {
        const response = await generoService.getGeneros()
        generos.value = response.data.data || []
        console.log('Géneros cargados:', generos.value)
    } catch (err) {
        error.value = err.message
        console.error('Error cargando géneros:', err)
    } finally {
        loading.value = false
    }
}

const testLibros = async () => {
    loading.value = true
    error.value = null
    try {
        const response = await libroService.getLibros()
        libros.value = response.data.data || []
        console.log('Libros cargados:', libros.value)
    } catch (err) {
        error.value = err.message
        console.error('Error cargando libros:', err)
    } finally {
        loading.value = false
    }
}
</script>

<style scoped>
.test-page {
    padding: 40px;
    max-width: 800px;
    margin: 0 auto;
}

.test-section {
    margin-bottom: 30px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
}

button {
    background-color: #e60000;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
    margin-bottom: 15px;
}

button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
}

.loading {
    color: #666;
    font-style: italic;
}

.error {
    color: #e60000;
    font-weight: bold;
}

.success {
    color: #28a745;
}

ul {
    list-style-type: none;
    padding: 0;
}

li {
    padding: 5px 0;
    border-bottom: 1px solid #eee;
}
</style>
