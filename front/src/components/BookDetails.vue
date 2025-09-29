<template>
    <div class="book-details">
        <div class="details-content">
            <!-- Título del libro -->
            <h1 class="book-title">{{ libroStore.featuredLibro?.titulo || 'ATLANTIS; PROYECTO TARSIS' }}</h1>
            
            <!-- Idioma -->
            <div class="book-language">({{ libroStore.featuredLibro?.idioma || 'español' }})</div>
            
            <!-- Autor -->
            <div class="book-author">Autor: {{ libroStore.featuredLibro?.autor?.nombre || 'TONO GALIANA Z' }}</div>
            
            <!-- Precio -->
            <div class="book-price">ARS $ {{ formatPrice(libroStore.featuredLibro?.precio) || '29.800' }}</div>
            
            <!-- Calificaciones -->
            <div class="book-rating">
                <div class="stars">
                    <v-icon name="bi-star-fill" v-for="n in 3" :key="n" class="star filled" />
                    <v-icon name="bi-star" v-for="n in 2" :key="n + 3" class="star empty" />
                </div>
                <span class="rating-text">3 de 5 estrellas</span>
            </div>
            
            <!-- Íconos de interacción -->
            <div class="interaction-icons">
                <div class="icon-item">
                    <v-icon name="bi-envelope" class="icon" />
                    <span class="icon-label">Email</span>
                </div>
                <div class="icon-item">
                    <v-icon name="bi-share" class="icon" />
                    <span class="icon-label">Compartir</span>
                </div>
                <div class="icon-item">
                    <v-icon name="bi-eye" class="icon" />
                    <span class="icon-label">823</span>
                </div>
                <div class="icon-item">
                    <v-icon name="bi-chat-dots" class="icon" />
                    <span class="icon-label">123</span>
                </div>
                <div class="icon-item">
                    <v-icon name="bi-share-fill" class="icon" />
                    <span class="icon-label">123</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useLibroStore } from '../store/generoLibroStore'

const libroStore = useLibroStore()

const formatPrice = (price) => {
    if (!price) return null
    return new Intl.NumberFormat('es-AR').format(price)
}
</script>

<style scoped>
.book-details {
    margin-top: 70px; /* Altura del header */
    margin-left: 20%; /* Ancho del sidebar izquierdo */
    margin-right: 20%; /* Ancho del sidebar derecho */
    padding: 40px;
    background-color: #fff;
    min-height: 400px;
}

.details-content {
    max-width: 800px;
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.book-title {
    font-size: 32px;
    font-weight: bold;
    color: #333;
    margin: 0;
    line-height: 1.2;
}

.book-language {
    font-size: 14px;
    color: #666;
    font-style: italic;
}

.book-author {
    font-size: 16px;
    color: #555;
    font-weight: 500;
}

.book-price {
    font-size: 28px;
    font-weight: bold;
    color: #e60000;
    margin: 10px 0;
}

.book-rating {
    display: flex;
    align-items: center;
    gap: 10px;
}

.stars {
    display: flex;
    gap: 2px;
}

.star {
    font-size: 20px;
}

.star.filled {
    color: #ffd700;
}

.star.empty {
    color: #ddd;
}

.rating-text {
    font-size: 14px;
    color: #666;
}

.interaction-icons {
    display: flex;
    gap: 30px;
    margin-top: 20px;
    padding-top: 20px;
    border-top: 1px solid #e0e0e0;
}

.icon-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 5px;
    cursor: pointer;
    transition: transform 0.2s ease;
}

.icon-item:hover {
    transform: translateY(-2px);
}

.icon {
    font-size: 24px;
    color: #666;
    transition: color 0.2s ease;
}

.icon-item:hover .icon {
    color: #e60000;
}

.icon-label {
    font-size: 12px;
    color: #666;
    font-weight: 500;
}

/* Responsive */
@media screen and (max-width: 1024px) {
    .book-details {
        margin-left: 25%;
        margin-right: 25%;
        padding: 30px;
    }
    
    .book-title {
        font-size: 28px;
    }
    
    .book-price {
        font-size: 24px;
    }
}

@media screen and (max-width: 768px) {
    .book-details {
        margin-left: 30%;
        margin-right: 30%;
        padding: 20px;
    }
    
    .book-title {
        font-size: 24px;
    }
    
    .book-price {
        font-size: 20px;
    }
    
    .interaction-icons {
        gap: 20px;
    }
    
    .icon {
        font-size: 20px;
    }
}

@media screen and (max-width: 480px) {
    .book-details {
        margin-left: 0;
        margin-right: 0;
        padding: 15px;
    }
    
    .book-title {
        font-size: 20px;
    }
    
    .book-price {
        font-size: 18px;
    }
    
    .interaction-icons {
        gap: 15px;
        flex-wrap: wrap;
    }
    
    .icon {
        font-size: 18px;
    }
    
    .icon-label {
        font-size: 11px;
    }
}
</style>
