<template>
    <div class="left-sidebar">
        <div class="sidebar-content">
            <h3 class="sidebar-title">Categorías</h3>
            <div v-if="generoStore.loading" class="loading">
                <div class="spinner"></div>
                <p>Cargando categorías...</p>
            </div>
            <div v-else-if="generoStore.error" class="error">
                <p>Error: {{ generoStore.error }}</p>
                <button @click="generoStore.fetchGeneros" class="retry-btn">Reintentar</button>
            </div>
            <ul v-else class="category-list">
                <li 
                    v-for="genero in generoStore.generos" 
                    :key="genero.id"
                    :class="['category-item', { active: generoStore.selectedGenero?.id === genero.id }]"
                    @click="selectGenero(genero)"
                >
                    {{ genero.nombre }}
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup>
import { onMounted } from 'vue'
import { useGeneroStore } from '../store/generoLibroStore'

const generoStore = useGeneroStore()

const selectGenero = (genero) => {
    generoStore.selectGenero(genero)
    // Emitir evento para que el componente padre pueda reaccionar
    // Por ejemplo, cargar libros de este género
}

onMounted(() => {
    generoStore.fetchGeneros()
})
</script>

<style scoped>
.left-sidebar {
    width: 20%;
    min-width: 250px;
    background-color: #fff;
    border-right: 1px solid #e0e0e0;
    position: fixed;
    left: 0;
    top: 70px; /* Altura del header */
    height: calc(100vh - 70px);
    overflow-y: auto;
    z-index: 100;
}

.sidebar-content {
    padding: 20px;
}

.sidebar-title {
    font-size: 18px;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #e60000;
}

.category-list {
    list-style: none;
    padding: 0;
    margin: 0;
}

.category-item {
    padding: 12px 15px;
    margin-bottom: 5px;
    cursor: pointer;
    border-radius: 4px;
    transition: all 0.2s ease;
    color: #333;
    font-size: 14px;
}

.category-item:hover {
    background-color: #f5f5f5;
}

.category-item.active {
    background-color: #cccccc;
    color: #000;
    font-weight: 500;
}

.loading {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    color: #666;
}

.spinner {
    width: 20px;
    height: 20px;
    border: 2px solid #e0e0e0;
    border-top: 2px solid #e60000;
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin-bottom: 10px;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.error {
    padding: 20px;
    text-align: center;
    color: #e60000;
}

.error p {
    margin: 0 0 10px 0;
    font-size: 14px;
}

.retry-btn {
    background-color: #e60000;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 12px;
    transition: background-color 0.2s ease;
}

.retry-btn:hover {
    background-color: #cc0000;
}

/* Responsive */
@media screen and (max-width: 1024px) {
    .left-sidebar {
        width: 25%;
        min-width: 200px;
    }
}

@media screen and (max-width: 768px) {
    .left-sidebar {
        width: 30%;
        min-width: 180px;
    }
    
    .sidebar-content {
        padding: 15px;
    }
    
    .category-item {
        padding: 10px 12px;
        font-size: 13px;
    }
}

@media screen and (max-width: 480px) {
    .left-sidebar {
        display: none; /* Ocultar en móviles muy pequeños */
    }
}
</style>
