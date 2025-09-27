<template>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img :src="`${'https://www.tidelib.com.ar'}${book.imagen_portada}`" alt="Imagen del libro">
                <div class="box-info">
                    <h5 class="title">titulo</h5>
                    <p class="idioma">idioma</p>
                    <p class="precio">AR</p>
                </div>
            </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</template>

<script setup>
import { onMounted, ref } from 'vue'
import BooksServiceApi from '../services/booksServices';

const bookService = new BooksServiceApi();
const mostViewed = ref([]);

const getDataBooks = async () => {
    try {
        const data = await bookService.mostViewed();
        mostViewed.value = data.data.items;
    } catch (error) {
        console.error('Error fetching data:', error);
    }
}

onMounted(async () => {
    try {
        getDataBooks();
        console.log('store montado');
    } catch (error) {
        console.log('store no montado:', error);
    }
});
</script>

<style scoped>
.most-viewed {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    margin: -20px 40px;
}

.item img {
    width: 70px;
    height: 60px;
    border-radius: 50%;
    padding: 0 10px;
}
</style>