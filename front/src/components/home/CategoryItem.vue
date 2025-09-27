<template>
    <div class="container">
        <div class="title">
            <h2>Explorar por</h2>
            <h3>Categorias</h3>
        </div>
        <div class="parent">
            <div class="div1">
                <span class="text">Novedades <v-icon name="gi-white-book" scale="2" /></span>
            </div>
            <div class="div2">
                <span class="text">Infantil y juvenil <v-icon name="fa-child" scale="2" /></span>
            </div>
            <div class="div3">
                <span class="more-views">Más leidos <v-icon name="gi-book-cover" scale="5" class="icon-more" /></span>
            </div>
            <div class="div4">
                <span class="text">Educativos <v-icon name="gi-bookshelf" scale="2" /></span>
            </div>
            <div class="div5">
                <span class="text">Recomendados <v-icon name="io-chatbubbles" scale="2" /></span>
            </div>
            <div class="div6">
                <span class="text">Audiolibros <v-icon name="fa-headphones-alt" scale="2" /></span>
            </div>
            <div class="div7">
                <span class="text">Gratis <v-icon name="fa-hand-holding-usd" scale="2" /></span>
            </div>
        </div>
        <div class="parent-responsive">
            <div class="div1">
                <span class="text">Novedades <v-icon name="gi-white-book" scale="2" /></span>
            </div>
            <div class="div2">
                <span class="text">Infantil y juvenil <v-icon name="fa-child" scale="2" /></span>
            </div>
            <div class="div3">
                <span class="more-views">Más leidos <v-icon name="gi-book-cover" scale="2" class="icon-more" /></span>
            </div>
            <div class="div4">
                <span class="text">Educativos <v-icon name="gi-bookshelf" scale="2" /></span>
            </div>
            <div class="div5">
                <span class="text">Recomendados <v-icon name="io-chatbubbles" scale="2" /></span>
            </div>
            <div class="div6">
                <span class="text">Audiolibros <v-icon name="fa-headphones-alt" scale="2" /></span>
            </div>
            <div class="div7">
                <span class="text">Gratis <v-icon name="fa-hand-holding-usd" scale="2" /></span>
            </div>
        </div>
    </div>
</template>

<script setup>

</script>

<style scoped>
.container {
    width: 100%;
    max-width: 200%;
    margin: auto;
}

.title {
    width: 30%;
    display: flex;
    margin: 50px 200px;
    border-bottom: 5px solid #FF393E;
}

.title h2 {
    font-weight: normal;
    font-style: italic;
    margin: 5px 10px;
}

.title h3 {
    font-size: 38px;
    font-weight: bold;
}

.parent {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    grid-template-rows: repeat(5, 1fr);
    gap: 16px;
    margin-left: 200px;
}

.parent div {
    background-color: #D9D9D9;
    border-radius: 8px;
    padding: 30px 45px;
    text-align: center;
    cursor: pointer;
    transition: .4s;
}

.parent div:hover {
    transform: translateY(-8%);
    background-color: rgba(255, 57, 64, 0.50);
    color: #fff;
}

.div2 {
    grid-column-start: 1;
    grid-row-start: 2;
}

.div3 {
    grid-row: span 2 / span 2;
    grid-column-start: 2;
    grid-row-start: 1;
    text-align: center;
}

.icon-more {
    width: 100%;
}

.div4 {
    grid-column-start: 3;
    grid-row-start: 1;
}

.div5 {
    grid-column-start: 3;
    grid-row-start: 2;
}

.div6 {
    grid-column-start: 4;
    grid-row-start: 1;
}

.div7 {
    grid-column-start: 4;
    grid-row-start: 2;
}

.parent-responsive {
    display: none;
}

/* ------------------------------------------------------------ */
/* ----------------------- CODE RESPONSIVE -------------------- */
/* ------------------------------------------------------------ */

@media screen and (max-width: 800px) {
    .title {
        width: 100%;
        margin: 50px auto;
        padding: 5px;
    }

    .title h2 {
        margin: 0 10px 10px 10px;
    }

    .title h3 {
        font-size: 28px;
        font-weight: bold;
    }

    .parent {
        display: none;
    }

    .parent-responsive {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        grid-template-rows: repeat(5, 1fr);
        gap: 8px;
    }

    .div3 {
        grid-column: span 2 / span 2;
        grid-row: span 2 / span 2;
        grid-row-start: 2;
    }

    .div4 {
        grid-row-start: 4;
    }

    .div5 {
        grid-row-start: 4;
    }

    .div6 {
        grid-row-start: 5;
    }

    .div7 {
        grid-row-start: 5;
    }
}
</style>