<template>
    <div class="book-view">
        <div class="overlay"></div>
        <div class="nav">
            <Navbar />
        </div>
        <div class="detaild">
            <BookDetail />
        </div>
        <div class="footer">
            <FooterItem />
        </div>
    </div>
</template>

<script setup>
import Navbar from '../components/Navbar.vue';
import BookDetail from '../components/books/BookDetail.vue';
import FooterItem from '../components/FooterItem.vue';


</script>

<style scoped>
.book-view {
    position: absolute;
    width: 100%;
    height: auto;
    /* background-image: url(/src/assets/background.png); */
    background-color: #c0c0c0;
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    overflow: hidden;
}
</style>