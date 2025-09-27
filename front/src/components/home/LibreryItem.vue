<template>
    <div id="library-section" class="container">
        <div class="box">
            <div class="box-title">
                <h1>¿Qué Descubrirás?</h1>
            </div>
            <div class="box-gender">
                <SliderGender />
            </div>
        </div>
        <div class="librery">
            <!-- <router-link :to="{ name: 'book-detail', params: { id: book.id } }" class="librery-item"
                v-for="book in libreryData" :key="book.id"> -->
            <router-link v-for="book in filteredBooks" :key="book.id"
                :to="{ name: 'book-detail', params: { id: book.id } }" class="librery-item">
                <img class="imgBook" :src="`${'https://www.tidelib.com.ar'}${book.imagen_portada}`"
                    alt="Imagen del libro">
                <div class="box-icons">
                    <img class="image" src="../../assets/icons/pizarra_of.png" alt="">
                    <img class="image" src="../../assets/icons/correo_privado.png" alt="">
                    <img class="image" src="../../assets/icons/comentarios.png" alt="">
                    <img class="image" src="../../assets/icons/ojo.png" alt="">
                    <img class="image" src="../../assets/icons/compartir.png" alt="">
                    <img class="image" src="../../assets/icons/intercambio_tidelib.png" alt="">
                </div>
                <div class="box-info">
                    <h5 class="title">{{ book.titulo }}</h5>
                    <p class="idioma">({{ book.idioma }})</p>
                    <p class="precio">AR ${{ book.precio }}</p>
                    <div class="box-stars">
                        <img src="../../assets/icons/estrella_of.png" alt="">
                        <img src="../../assets/icons/estrella_of.png" alt="">
                        <img src="../../assets/icons/estrella_of.png" alt="">
                        <img src="../../assets/icons/estrella_of.png" alt="">
                        <img src="../../assets/icons/estrella_of.png" alt="">
                    </div>
                </div>
            </router-link>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref, computed, onUnmounted } from 'vue';
import SliderGender from '../../components/SliderGender.vue';
import BooksServiceApi from '../../services/booksServices';
import useBooksStore from '../../store/booksStore';

const booksServices = new BooksServiceApi();
const booksStore = useBooksStore();

const booksList = ref([]);

const getAllBooks = async () => {
    try {
        const data = await booksServices.allBooks();
        booksList.value = data?.data?.data || []; 
    } catch (error) {
        console.error("Error fetching books:", error);
        booksList.value = [];
    }
};

const filteredBooks = computed(() => {
    const query = booksStore.searchQuery.toLowerCase();
    const selectedGenre = booksStore.selectedGenre;

    return booksList.value.filter((book) => {
        const titulo = book.titulo?.toLowerCase() || "";
        const autor = `${book.autor?.nombre || ""} ${book.autor?.apellido || ""}`.toLowerCase();
        const matchSearch = titulo.includes(query) || autor.includes(query);
        const matchGenre = selectedGenre ? book.genero_id === selectedGenre : true;
        return matchSearch && matchGenre;
    });
});


onMounted(async () => {
    await getAllBooks();
});

onUnmounted(() => {
    booksStore.setSelectedGenre(null);
});
</script>

<style scoped>
a {
    text-decoration: none;
    color: #000;
}

.container {
    width: 100%;
    max-width: 2200px;
    height: auto;
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    background-color: rgba(255, 57, 64, 0.20);
    margin-top: -250px;
}

.box {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
}

.box .box-title {
    width: 100%;
    text-align: center;
    margin: 80px auto auto auto;
    font-style: italic;
}

.librery {
    width: 90%;
    height: auto;
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
    gap: 60px;
    padding: 10px 60px;
}

.librery-item {
    display: flex;
    flex-wrap: wrap;
    /* background-color: #fff8dc; */
    border-radius: 8px;
    padding: 10px;
    overflow: hidden;
}

.librery-item .imgBook {
    width: 200px;
    height: 300px;
    border-radius: 4px;
    transition: .5s;
}

.librery-item .imgBook:hover {
    width: 210px;
    height: 310px;
    z-index: 10;
}

.box-icons {
    width: 10%;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    margin-left: 5px;
}

.box-icons .image {
    width: 20px;
    height: auto;
    object-fit: cover;
    transition: .5s;
}

.box-icons .image:hover {
    width: 25px;
    height: auto;
    object-fit: cover;
}

.box-info {
    width: 75%;
    display: flex;
    flex-wrap: wrap;
    text-align: center;
}

.box-stars {
    margin: auto;
}

.box-stars img {
    width: 20%;
    height: auto;
    object-fit: cover;
    padding: 2px;
}

.title {
    width: 100%;
    margin-top: 10px;
}

.idioma,
.precio {
    width: 100%;
}
</style>
