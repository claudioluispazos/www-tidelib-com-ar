<template>
    <div v-if="loadingStatus">Cargando...</div>

    <div v-else-if="error">
        <p>{{ error }}</p>
    </div>

    <div class="container" v-else-if="bookData">
        <img class="book" :src="`https://www.tidelib.com.ar${bookData.imagen_portada}`" alt="Portada del libro" />
        <div class="content">
            <h2 class="title">{{ bookData.titulo }}</h2>
            <h4>{{ bookData.autor?.nombre }} {{ bookData.autor?.apellido }}</h4>
            <p class="sinopsis">{{ bookData.sinopsis }}</p>
            <div class="box">
                <span class="price">${{ bookData.precio }}</span>
                <div class="input-group" style="max-width: 160px;">
                    <button class="btn btn-outline-danger" type="button" @click="minusBtn">−</button>
                    <input type="text" class="form-control text-center" v-model="quantity" readonly />
                    <button class="btn btn-outline-success" type="button" @click="plusBtn">+</button>
                </div>
                <button class="btn btn-success">Comprar</button>
            </div>
            <div class="line"></div>
            <div class="box-info">
                <p><strong>ISBN:</strong> {{ bookData.isbn }}</p>
                <p><strong>Editorial:</strong> {{ bookData.editorial?.razon_social }}</p>
                <p><strong>Idioma:</strong> {{ bookData.idioma }}</p>
                <p><strong>Género:</strong> {{ bookData.genero?.nombre }}</p>
            </div>
            <div class="line"></div>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import { useRoute } from 'vue-router';
import { storeToRefs } from 'pinia';
import useBooksStore from '../../store/booksStore';

const route = useRoute();
const bookId = route.params.id;

const booksStore = useBooksStore();
const { bookData, loadingStatus, error } = storeToRefs(booksStore);

const quantity = ref(1)

const minusBtn = () => {
    if (quantity.value > 1) {
        quantity.value--
    }
}

const plusBtn = () => {
    quantity.value++
}

onMounted(() => {
    booksStore.fetchBookDetail(bookId);
});
</script>

<style scoped>
.container {
    width: 100%;
    height: auto;
    display: flex;
    /* flex-wrap: wrap; */
    margin: 150px;
}

.content {
    margin: 20px 50px;
}

.book {
    position: relative;
    width: 400px;
    height: 600px;
}

.title {
    width: 70%;
}

.sinopsis {
    width: 90%;
    text-align: justify;
    margin: 20px 10px;
}

.box {
    width: 80%;
    display: flex;
    justify-content: space-between;
    margin: 30px 0;
}

.price {
    width: 20%;
    text-align: center;
    font-size: 16px;
    font-weight: 700;
    padding: 10px;
    color: #fff;
    background-color: #000;
    border-radius: 16px;
}

.line {
    width: 100%;
    height: 1px;
    background-color: #686868;
}

.box-info {
    width: 100%;
    margin: 40px 20px;
}

.box-info p {
    width: 60%;
    display: flex;
    justify-content: space-between;
    padding: 10px;
    margin: 0;
}
</style>