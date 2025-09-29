<template>
    <nav class="header">
        <div class="header-container">
            <!-- Logo Tidelib + Modo administrador -->
            <div class="logo-section">
                <img src="../assets/logo/tidelib_blanco.png" alt="Tidelib" class="logo-tidelib" />
                <span class="admin-mode">Modo: administrador</span>
            </div>

            <!-- Barra de búsqueda -->
            <div class="search-section">
                <input 
                    type="text" 
                    class="search-input" 
                    placeholder="Buscar..." 
                    v-model="searchTerm"
                    @keyup.enter="performSearch"
                />
                <v-icon name="bi-search" class="search-icon" @click="performSearch" />
            </div>

            <!-- Iconos de navegación -->
            <div class="nav-icons">
                <a href="#" class="nav-icon">
                    <v-icon name="gi-shopping-cart" scale="1.2" />
                </a>
                <a href="#" class="nav-icon">
                    <v-icon name="fa-user-circle" scale="1.2" />
                </a>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { ref, watch } from 'vue'
import { useLibroStore } from '../store/generoLibroStore'

const libroStore = useLibroStore()
const searchTerm = ref('')

const performSearch = async () => {
    if (searchTerm.value.trim()) {
        await libroStore.searchLibros(searchTerm.value.trim())
        // Scroll to results
        const resultsElement = document.querySelector('.search-results')
        if (resultsElement) {
            resultsElement.scrollIntoView({ behavior: 'smooth' })
        }
    }
}

// Limpiar resultados cuando se borre la búsqueda
watch(searchTerm, (newValue) => {
    if (!newValue.trim()) {
        libroStore.libros = []
    }
})
</script>

<style scoped>
.header {
    background-color: #e60000;
    width: 100%;
    height: 70px;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 1000;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.header-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 100%;
    padding: 0 20px;
    max-width: 100%;
}

.logo-section {
    display: flex;
    align-items: center;
    gap: 15px;
}

.logo-tidelib {
    height: 40px;
    width: auto;
    object-fit: contain;
}

.admin-mode {
    color: #fff;
    font-size: 14px;
    font-weight: 500;
}

.search-section {
    position: relative;
    flex: 1;
    max-width: 400px;
    margin: 0 20px;
}

.search-input {
    width: 100%;
    height: 40px;
    padding: 0 40px 0 15px;
    border: none;
    border-radius: 4px;
    background-color: #fff;
    font-size: 14px;
    outline: none;
}

.search-input::placeholder {
    color: #666;
}

.search-icon {
    position: absolute;
    right: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #666;
    font-size: 16px;
    cursor: pointer;
    transition: color 0.2s ease;
}

.search-icon:hover {
    color: #e60000;
}

.nav-icons {
    display: flex;
    align-items: center;
    gap: 20px;
}

.nav-icon {
    color: #fff;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 4px;
    transition: background-color 0.2s ease;
}

.nav-icon:hover {
    background-color: rgba(255, 255, 255, 0.1);
}

/* Responsive */
@media screen and (max-width: 768px) {
    .header-container {
        padding: 0 15px;
    }
    
    .admin-mode {
        display: none;
    }
    
    .search-section {
        margin: 0 10px;
    }
    
    .nav-icons {
        gap: 10px;
    }
}

@media screen and (max-width: 480px) {
    .logo-tidelib {
        height: 35px;
    }
    
    .search-input {
        height: 35px;
        font-size: 13px;
    }
    
    .nav-icon {
        width: 35px;
        height: 35px;
    }
}
</style>