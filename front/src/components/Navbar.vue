<template>
    <nav :class="['menu', { scrolled: isScrolled }]">
        <section class="menu_container">
            <div class="logo">
                <img :src="logoSrc" alt="Logo" id="logo" />
                <div class="line"></div>
                <img src="../assets/logo/tidelib_blanco.png" alt="" id="tidelib" />

            </div>
            <!-- <div class="input-group mb-3 search">
                <input type="text" class="form-control" placeholder="Buscar libros..." aria-label="Recipient's username"
                    aria-describedby="button-addon2" />
                <button class="btn btn-dark" type="button" id="button-addon2">
                    <v-icon name="bi-search" scale="1.5" />
                </button>
            </div> -->

            <ul :class="['menu_links', { 'is-active': menuOpen }]">
                <li class="menu_item">
                    <router-link :to="{ name: 'home' }" class="menu_link">Inicio</router-link>
                </li>
                <li class="menu_item"><a href="#" class="menu_link">Nosotros</a></li>
                <li class="menu_item menu_item--show">
                    <a href="#" class="menu_link" @click.prevent="toggleSubmenu('escritorio')">
                        Escritorio <v-icon name="md-keyboardarrowdown" class="icon" />
                    </a>
                    <ul class="menu_nesting" :class="{ 'is-open': openSubmenu === 'escritorio' }">
                        <li><a href="#" class="menu_link menu_link--inside">Mensajes</a></li>
                        <li><a href="#" class="menu_link menu_link--inside">Correctores</a></li>
                        <li><a href="#" class="menu_link menu_link--inside">Editoriales</a></li>
                    </ul>
                </li>
                <li class="menu_item"><a href="#" class="menu_link">Pizarra</a></li>

                <!-- <li class="menu_item menu_item--show">
                    <a href="#" class="menu_link" @click.prevent="toggleSubmenu('novedades')">
                        Novedades <v-icon name="md-keyboardarrowdown" class="icon" />
                    </a>
                    <ul class="menu_nesting" :class="{ 'is-open': openSubmenu === 'novedades' }">
                        <li><a href="#" class="menu_link menu_link--inside">Nuevo</a></li>
                        <li><a href="#" class="menu_link menu_link--inside">Gratis</a></li>
                        <li><a href="#" class="menu_link menu_link--inside">Pizarra</a></li>
                    </ul>
                </li> -->

                <!-- <li class="menu_item menu_item--show">
                    <a href="#" class="menu_link" @click.prevent="toggleSubmenu('somos')">
                        ¿Quiénes Somos? <v-icon name="md-keyboardarrowdown" class="icon" />
                    </a>
                    <ul class="menu_nesting" :class="{ 'is-open': openSubmenu === 'somos' }">
                        <li><a href="#" class="menu_link menu_link--inside">Visión y Objetivo</a></li>
                    </ul>
                </li> -->

                <li class="menu_item"><a href="#" class="menu_link">Contacto</a></li>
                <li class="menu_item"><a href="#" class="menu_link"><v-icon name="gi-shopping-cart" scale="1.5" /></a></li>
                <li class="menu_item menu_item--show">
                    <template v-if="user">
                        <a href="#" class="menu_link" @click.prevent="toggleSubmenu('usuario')">
                            {{ user.name }}
                            <v-icon name="md-arrowdropdown-round" class="icon" />
                        </a>
                        <ul class="menu_nesting" :class="{ 'is-open': openSubmenu === 'usuario' }">
                            <li>
                                <a href="#" class="menu_link menu_link--inside" @click.prevent="logout">Logout</a>
                            </li>
                        </ul>
                    </template>
                    <template v-else>
                        <a href="#" class="menu_link" @click.prevent="toggleSubmenu('usuario')">
                            <v-icon name="fa-user-circle" scale="1.5" />
                            <v-icon name="md-arrowdropdown-round" class="icon" />
                        </a>
                        <ul class="menu_nesting" :class="{ 'is-open': openSubmenu === 'usuario' }">
                            <li>
                                <router-link :to="{ name: 'login' }" class="menu_link menu_link--inside">
                                    Iniciar sesión
                                </router-link>
                            </li>
                            <li>
                                <router-link :to="{ name: 'register' }" class="menu_link menu_link--inside">
                                    Registro
                                </router-link>
                            </li>
                        </ul>
                    </template>
                </li>
            </ul>
            <div class="menu_hamburger" @click="toggleMenu">
                <v-icon name="md-menu" scale="1.5" color="#fff" class="menu_img" />
            </div>
        </section>
    </nav>
</template>

<script setup>
import { ref, onMounted, onBeforeUnmount, computed } from 'vue'
import AuthServiceApi from '../services/authService';

const authService = new AuthServiceApi();
const user = ref(null);
const menuOpen = ref(false)
const openSubmenu = ref(null)
const isScrolled = ref(false)

const logoSrc = computed(() =>
    isScrolled.value
        ? new URL('../assets/logo/t_roja_fondo_gis_2.png', import.meta.url).href
        : new URL('../assets/logo/t_roja_fondo_color.png', import.meta.url).href
)

const toggleMenu = () => {
    menuOpen.value = !menuOpen.value
}

const toggleSubmenu = (menuName) => {
    openSubmenu.value = openSubmenu.value === menuName ? null : menuName
}

const handleScroll = () => {
    isScrolled.value = window.scrollY > 50
}

const logout = () => {
    authService.logout();
    user.value = null;
};

onMounted(() => {
    user.value = authService.getUser();
    window.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') menuOpen.value = false
    })
    window.addEventListener('scroll', handleScroll)
})

onBeforeUnmount(() => {
    window.removeEventListener('scroll', handleScroll)
})
</script>

<style scoped>
.logo {
    display: flex;
    margin: auto 50px;
}

#logo {
    width: 60px;
    height: 60px;
    transition: all 0.3s ease-in-out;
    display: flex;
    margin: 10px;
}

#tidelib {
    width: auto;
    height: 25px;
    display: flex;
    margin: auto 5px;
}

.line {
    width: 4px;
    height: 50px;
    margin: auto 10px;
    background-color: #fff;
}

.menu {
    background-color: transparent;
    backdrop-filter: blur(10px);
    width: 100%;
    height: 75px;
    position: fixed;
    z-index: 13;
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.menu.scrolled {
    background-color: #ff393e;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
}

.menu_container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
    max-width: 100%;
    height: 100%;
    padding: 0 40px;
    box-sizing: border-box;
}

.menu_links {
    height: 100%;
    transition: transform .5s;
    display: flex;
    z-index: 10;
}

.menu_item {
    list-style: none;
    position: relative;
    height: 100%;
    --clip: polygon(0 0, 100% 0, 100% 0, 0 0);
    --transform: rotate(-90deg);
}

.menu_item:hover {
    --clip: polygon(0 0, 100% 0, 100% 100%, 0% 100%);
    --transform: rotate(0);
}

.icon {
    transform: var(--transform);
    transition: transform .3s;
    display: block;
    right: 3px;
}

.menu_link {
    height: 100%;
    display: flex;
    padding: 0 20px;
    align-items: center;
    text-decoration: none;
    color: #fff;
}

.menu_link:hover {
    background-color: #ff5c61;
}

.menu_nesting {
    list-style: none;
    transition: clip-path .3s;
    clip-path: var(--clip);
    position: absolute;
    height: auto;
    right: 0;
    bottom: 0;
    width: max-content;
    transform: translateY(100%);
    background-color: #ff393e;
}

.menu_link--inside {
    height: 70px;
    padding: 30px, 100px, 30px, 20px;
}

.menu_link--inside:hover {
    background-color: #ff5c61;
    width: 100%;
}

.menu_hamburger {
    height: auto;
    display: flex;
    align-items: center;
    padding: 0 15px;
    cursor: pointer;
    display: none;
    z-index: 100;
}

.menu_img {
    display: block;
}

/* ----------------------- RESPNSIVE CODE ----------------------- */

@media screen and (max-width: 1024px) {
    #logo {
        width: 70px;
        height: 70px;
        margin: -10px -15px 0 -20px;
    }

    .search {
        display: none;
    }
}

@media screen and (max-width: 820px) {
    .search {
        display: flex;
    }

    .menu_container {
        padding: 0 20px;
    }

    .menu_links {
        position: fixed;
        top: 0;
        right: 0;
        background-color: #ff393e;
        flex-direction: column;
        height: 100vh;
        width: 250px;
        transform: translateX(100%);
        transition: transform 0.3s ease;
        padding-top: 100px;
        z-index: 100;
        overflow-y: auto;
    }

    .menu_links.is-active {
        transform: translateX(0);
    }

    .menu_link {
        padding: 20px 30px;
        color: #fff;
        height: auto;
    }

    .menu_nesting {
        overflow: hidden;
        max-height: 0;
        transition: max-height 0.3s ease;
        background-color: #ff5c61;
        display: flex;
        flex-direction: column;
        padding-left: 20px;
        position: static !important;
        transform: none !important;
        clip-path: none !important;
    }

    .menu_nesting.is-open {
        max-height: 500px;
        /* Ajustable si tienes muchos ítems */
    }

    .menu_link--inside {
        padding: 15px 40px;
        border-left: 2px solid #fff;
    }

    .menu_hamburger {
        display: flex !important;
        margin-top: -20px;
        margin-right: -18px;
    }

    #logo {
        width: 50px;
        height: 50px;
        margin: -10px 10px 0 -10px;
    }
}
</style>