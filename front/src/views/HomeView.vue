<template>
    <div class="home-container">
        <div class="nav">
            <Navbar />
            <!-- <SideBar /> -->
        </div>
        <div class="banner">
            <HeroBanner />
        </div>
        <div class="slaide">
            <SliderBooks />
        </div>
        <div class="category">
            <CategoryItem />
        </div>
        <div class="librery">
            <LibreryItem />
        </div>
        <!-- <div class="most-viewed">
            <MostViewed />
        </div> -->
        <div class="footer">
            <FooterItem />
        </div>
    </div>
</template>

<script setup>
import Navbar from '../components/Navbar.vue';
import HeroBanner from '../components/home/HeroBanner.vue';
import SliderBooks from '../components/home/SliderBooks.vue';
import CategoryItem from '../components/home/CategoryItem.vue';
import LibreryItem from '../components/home/LibreryItem.vue';
// import MostViewed from '../components/MostViewed.vue';
import FooterItem from '../components/FooterItem.vue';
// import SideBar from '../components/SideBar.vue';
</script>

<style scoped>
.home-container {
    position: absolute;
    width: 100%;
    height: auto;
    background-color: #fff;
    overflow: hidden;
}
</style>