<template>
    <div class="slaide-track">
        <div v-for="book in booksSalide" :key="book.id" class="slaide">
            <img :src="`${'https://www.tidelib.com.ar'}${book.imagen_portada}`" alt="Imagen del libro">
        </div>
        <div v-for="book in booksSalide" :key="book.id" class="slaide">
            <img :src="`${'https://www.tidelib.com.ar'}${book.imagen_portada}`" alt="Imagen del libro">
        </div>
        <div v-for="book in booksSalide" :key="book.id" class="slaide">
            <img :src="`${'https://www.tidelib.com.ar'}${book.imagen_portada}`" alt="Imagen del libro">
        </div>
        <div v-for="book in booksSalide" :key="book.id" class="slaide">
            <img :src="`${'https://www.tidelib.com.ar'}${book.imagen_portada}`" alt="Imagen del libro">
        </div>
        <div v-for="book in booksSalide" :key="book.id" class="slaide">
            <img :src="`${'https://www.tidelib.com.ar'}${book.imagen_portada}`" alt="Imagen del libro">
        </div>
        <div v-for="book in booksSalide" :key="book.id" class="slaide">
            <img :src="`${'https://www.tidelib.com.ar'}${book.imagen_portada}`" alt="Imagen del libro">
        </div>
        <div v-for="book in booksSalide" :key="book.id" class="slaide">
            <img :src="`${'https://www.tidelib.com.ar'}${book.imagen_portada}`" alt="Imagen del libro">
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from 'vue'
import BooksServiceApi from '../../services/booksServices';

const bookService = new BooksServiceApi();
const booksSalide = ref([]);

const getDataBooks = async () => {
    try {
        const data = await bookService.allBooks();
        console.log(data);
        booksSalide.value = data?.data?.data || [];
        console.log(booksSalide.value)
    } catch (error) {
        console.error('Error fetching data:', error);
        booksSalide.value = [];
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
.slaide-track {
    display: flex;
    width: 200%;
    animation: scroll 20s linear infinite;
    margin: 10px auto;
    overflow: hidden;
}

.slaide {
    flex: 0 0 auto;
    margin: 0;
}

@keyframes scroll {
    0% {
        transform: translateX(0);
    }

    100% {
        transform: translateX(-50%);
    }
}

.slaide img {
    width: 120px;
    height: 200px;
    object-fit: cover;
    margin: 0 5px;
}
</style>