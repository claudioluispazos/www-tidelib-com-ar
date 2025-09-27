<template>
    <div>
        <div class="iconSlider">
            <img src="../assets/icons/icono_generos504x504.png" />
            <div class="genderBox" v-for="gender in genderSlider" :key="gender.id" @click="selectGender(gender)">
                <p class="gender">{{ gender.nombre }}</p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import GenderServiceApi from '../services/genderServices';
import useBooksStore from '../store/booksStore';

const genderService = new GenderServiceApi();
const genderSlider = ref([]);
const booksStore = useBooksStore();

const getDataGenders = async () => {
    try {
        const data = await genderService.allGender();
        genderSlider.value = data?.data?.data || [];
    } catch (error) {
        console.error("Error fetching genders:", error);
        genderSlider.value = [];
    }
};

const selectGender = (gender) => {
    booksStore.setSelectedGenre(gender.id);
    booksStore.setSearchQuery("");
    console.log('se selecciono un genero', gender.nombre)
};

onMounted(() => {
    getDataGenders();
});
</script>

<style scoped>
.iconSlider {
    display: flex;
    align-items: center;
    gap: 16px;
    margin: 40px;
    flex-wrap: wrap;
}

.iconSlider img {
    margin-top: -20px;
    width: 50px;
    height: 50px;
}

.genderBox {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

.gender {
    /* background-color: #ff393e; */
    color: #000;
    padding: 20px 12px;
    font-size: 12px;
    text-align: center;
    white-space: nowrap;
    font-weight: bold;
    cursor: pointer;
    transition: .5s;
}

.gender:hover {
    transform: translateY(-5%);
    border-top: 2px solid #FF393E;
    border-bottom: 2px solid #FF393E;
}
</style>