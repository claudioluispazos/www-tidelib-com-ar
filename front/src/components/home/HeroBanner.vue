<template>
    <div class="banner">
        <div class="box-title">
            <h1>Encuentra tu</h1>
            <h3>Próxima Historia</h3>
            <div class="line"></div>

            <div class="input-group mb-3 search">
                <input type="text" v-model="searchInput" class="form-control" placeholder="Buscar libros..."
                    @keyup.enter="searchBooks" />
                <button class="btn btn-dark" type="button" @click="searchBooks">
                    <v-icon name="bi-search" scale="1.5" />
                </button>
            </div>
        </div>
        <div class="overlay-banner"></div>
    </div>
</template>

<script setup>
import { ref, nextTick, onMounted, onUnmounted } from 'vue';
import useBooksStore from '../../store/booksStore';

const booksStore = useBooksStore();
const searchInput = ref("");

const searchBooks = async () => {
    const query = searchInput.value.trim().toLowerCase();

    booksStore.setSearchQuery(query);

    searchInput.value = "";

    await nextTick(() => {
        const libraryElement = document.getElementById('library-section');
        if (libraryElement) {
            libraryElement.scrollIntoView({ behavior: 'smooth' });
        }
    });
};

onMounted(() => {
    searchInput.value = "";
    booksStore.setSearchQuery("");
});

onUnmounted(() => {
    booksStore.setSearchQuery("");
});

</script>

<style scoped>
.banner {
    display: flex;
    width: 100%;
    height: 80vh;
    background-image: url(../../assets/hero-banner.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    /* background-attachment: fixed; */
}

.box-title {
    width: 100%;
    color: #fff;
    margin: 120px;
    position: relative;
    z-index: 2;
}

h1 {
    font-size: 110px;
    margin: 0 0 10px 50px;
}

h3 {
    font-size: 80px;
    margin: 0 0 10px 50px;
}

.line {
    width: 50%;
    height: 10px;
    background-color: #fff;
    margin: 20px 50px;
}

.search {
    width: 50%;
    margin: auto 50px;
}

.search .form-control {
    /* border: 1px solid #fff; */
    border: none;
    background: rgba(255, 255, 255, 0.5);
    /* opacity: .2; */
}

.overlay-banner {
    height: 80vh;
    width: 100%;
    position: absolute;
    top: 0;
    left: 0;
    background: rgba(255, 57, 64, 0.15);
    z-index: 1;
}


/* ------------------------------------------------------------ */
/* ---------------------- BANNER RESPONSIVE ------------------- */
/* ------------------------------------------------------------ */

@media screen and (max-width: 1000px) {
    .banner {
        height: 50vh;
        margin: 70px auto auto auto;
    }

    .overlay-banner {
        height: 55vh;
    }

    .box-title {
        /* text-align: center; */
        margin: 80px auto;
    }

    h1 {
        font-size: 100px;
    }

    h3 {
        font-size: 70px;
    }

    .line {
        width: 40%;
        height: 7px;
        margin: 20px 50px;
    }
}

@media screen and (max-width: 850px) {
    .banner {
        height: 50vh;
        margin: 70px auto auto auto;
    }

    .overlay-banner {
        height: 57vh;
    }

    .box-title {
        /* text-align: center; */
        margin: 80px auto;
    }

    h1 {
        font-size: 80px;
    }

    h3 {
        font-size: 50px;
    }

    .line {
        width: 40%;
        height: 7px;
        margin: 20px 50px;
    }
}

@media screen and (max-width: 600px) {
    .banner {
        height: 40vh;
        margin: 70px auto auto auto;
    }

    .overlay-banner {
        height: 48vh;
    }

    .box-title {
        margin: 80px auto;
    }

    h1 {
        font-size: 40px;
    }

    h3 {
        font-size: 30px;
    }

    .line {
        width: 40%;
        height: 7px;
        margin: 20px 50px;
    }
}

@media screen and (max-width: 400px) {
    .banner {
        height: 40vh;
        margin: 70px auto auto auto;
    }

    .overlay-banner {
        height: 50vh;
    }

    .box-title {
        margin: 80px auto;
    }

    h1 {
        font-size: 40px;
    }

    h3 {
        font-size: 30px;
    }

    .line {
        width: 40%;
        height: 7px;
        margin: 20px 50px;
    }
}
</style>