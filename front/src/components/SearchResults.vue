<template>
    <div class="search-results" v-if="libroStore.libros.length > 0">
        <div class="results-header">
            <h2>Resultados de búsqueda</h2>
            <p>{{ libroStore.libros.length }} libro(s) encontrado(s)</p>
        </div>
        
        <div class="books-grid">
            <div 
                v-for="libro in libroStore.libros" 
                :key="libro.id"
                class="book-card"
                @click="selectBook(libro)"
            >
                <div class="book-image">
                    <img 
                        v-if="libro.imagen_portada" 
                        :src="libro.imagen_portada" 
                        :alt="libro.titulo"
                        class="book-cover"
                    />
                    <div v-else class="placeholder-cover">
                        <v-icon name="bi-book" scale="2" />
                    </div>
                </div>
                
                <div class="book-info">
                    <h3 class="book-title">{{ libro.titulo }}</h3>
                    <p class="book-author">{{ libro.autor?.nombre }} {{ libro.autor?.apellido }}</p>
                    <p class="book-genre">{{ libro.genero?.nombre }}</p>
                    <p class="book-price">ARS $ {{ formatPrice(libro.precio) }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useLibroStore } from '../store/generoLibroStore'

const libroStore = useLibroStore()

const selectBook = (libro) => {
    libroStore.setFeaturedLibro(libro)
    // Scroll to top to show the featured book
    window.scrollTo({ top: 0, behavior: 'smooth' })
}

const formatPrice = (price) => {
    if (!price) return '0'
    return new Intl.NumberFormat('es-AR').format(price)
}
</script>

<style scoped>
.search-results {
    margin-top: 70px; /* Altura del header */
    margin-left: 20%; /* Ancho del sidebar izquierdo */
    margin-right: 20%; /* Ancho del sidebar derecho */
    padding: 40px;
    background-color: #fff;
}

.results-header {
    margin-bottom: 30px;
    text-align: center;
}

.results-header h2 {
    color: #333;
    margin: 0 0 10px 0;
    font-size: 28px;
}

.results-header p {
    color: #666;
    margin: 0;
    font-size: 16px;
}

.books-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 20px;
}

.book-card {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}

.book-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.15);
}

.book-image {
    width: 100%;
    height: 200px;
    overflow: hidden;
}

.book-cover {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.placeholder-cover {
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
}

.book-info {
    padding: 15px;
}

.book-title {
    font-size: 16px;
    font-weight: bold;
    color: #333;
    margin: 0 0 8px 0;
    line-height: 1.3;
}

.book-author {
    font-size: 14px;
    color: #666;
    margin: 0 0 5px 0;
}

.book-genre {
    font-size: 12px;
    color: #999;
    margin: 0 0 10px 0;
}

.book-price {
    font-size: 16px;
    font-weight: bold;
    color: #e60000;
    margin: 0;
}

/* Responsive */
@media screen and (max-width: 1024px) {
    .search-results {
        margin-left: 25%;
        margin-right: 25%;
        padding: 30px;
    }
    
    .books-grid {
        grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
        gap: 15px;
    }
}

@media screen and (max-width: 768px) {
    .search-results {
        margin-left: 30%;
        margin-right: 30%;
        padding: 20px;
    }
    
    .books-grid {
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 12px;
    }
    
    .book-image {
        height: 150px;
    }
}

@media screen and (max-width: 480px) {
    .search-results {
        margin-left: 0;
        margin-right: 0;
        padding: 15px;
    }
    
    .books-grid {
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 10px;
    }
    
    .book-image {
        height: 120px;
    }
    
    .book-info {
        padding: 10px;
    }
    
    .book-title {
        font-size: 14px;
    }
    
    .book-author {
        font-size: 12px;
    }
    
    .book-price {
        font-size: 14px;
    }
}
</style>
