<template>
    <nav :class="['menu', { collapsed: isCollapsed }]">
        <section class="menu_container">
            <img src="../assets/logo/t_roja_fondo_gis_2.png" alt="" id="logo" @click="toggleCollapse" />

            <ul class="menu_links">
                <li class="menu_item">
                    <router-link :to="{ name: 'home' }" class="menu_link">
                        <v-icon name="md-home-round" scale="1.5"/>
                        <span v-show="!isCollapsed">Inicio</span>
                    </router-link>
                </li>

                <li class="menu_item">
                    <a href="#" class="menu_link">
                        <v-icon name="md-groups" scale="1.5"/>
                        <span v-show="!isCollapsed">Nosotros</span>
                    </a>
                </li>

                <li class="menu_item menu_item--show">
                    <a href="#" class="menu_link" @click.prevent="toggleSubmenu('escritorio')">
                        <v-icon name="md-dashboard" scale="1.5"/>
                        <span v-show="!isCollapsed">Escritorio</span>
                        <v-icon name="md-keyboardarrowdown" class="icon"/>
                    </a>
                    <ul class="menu_nesting" :class="{ 'is-open': openSubmenu === 'escritorio' }">
                        <li><a href="#" class="menu_link menu_link--inside">Mensajes</a></li>
                        <li><a href="#" class="menu_link menu_link--inside">Correctores</a></li>
                        <li><a href="#" class="menu_link menu_link--inside">Editoriales</a></li>
                    </ul>
                </li>

                <li class="menu_item">
                    <a href="#" class="menu_link">
                        <v-icon name="md-bordercolor" scale="1.5"/>
                        <span v-show="!isCollapsed">Pizarra</span>
                    </a>
                </li>

                <li class="menu_item">
                    <a href="#" class="menu_link">
                        <v-icon name="gi-shopping-cart" scale="2" />
                        <span v-show="!isCollapsed">Carrito</span>
                    </a>
                </li>

                <li class="menu_item menu_item--show">
                    <a href="#" class="menu_link" @click.prevent="toggleSubmenu('usuario')">
                        <v-icon name="fa-user-circle" scale="2" />
                        <v-icon name="md-arrowdropdown-round" class="icon" />
                    </a>
                    <ul class="menu_nesting" :class="{ 'is-open': openSubmenu === 'usuario' }">
                        <li><a href="#" class="menu_link menu_link--inside">Iniciar sesión</a></li>
                        <li><a href="#" class="menu_link menu_link--inside">Registro</a></li>
                    </ul>
                </li>
            </ul>
        </section>
    </nav>
</template>

<script setup>
import { ref } from 'vue'

const menuOpen = ref(false)
const openSubmenu = ref(null)
const isCollapsed = ref(true)

const toggleMenu = () => {
    menuOpen.value = !menuOpen.value
}

const toggleCollapse = () => {
    isCollapsed.value = !isCollapsed.value
}

const toggleSubmenu = (menuName) => {
    openSubmenu.value = openSubmenu.value === menuName ? null : menuName
}
</script>

<style scoped>
.menu {
    position: fixed;
    top: 0;
    left: 0;
    width: 220px;
    height: 100vh;
    background-color: #ff393e;
    display: flex;
    flex-direction: column;
    transition: width 0.3s ease;
    overflow: hidden;
    z-index: 100;
}

.menu.collapsed {
    width: 80px;
}

.menu_container {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-top: 20px;
    height: 100%;
}

#logo {
    width: 50px;
    height: 50px;
    cursor: pointer;
    margin-bottom: 30px;
}

.menu_links {
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 5px;
    padding: 0;
}

.menu_item {
    list-style: none;
    width: 100%;
}

.menu_link {
    display: flex;
    align-items: center;
    gap: 5px;
    padding: 25px 20px;
    color: #fff;
    text-decoration: none;
    white-space: nowrap;
    transition: background-color 0.3s;
}

.menu_link:hover {
    background-color: #ff5c61;
}

.icon {
    /* margin-left: auto; */
    transition: transform 0.3s;
}

.menu_nesting {
    list-style: none;
    overflow: hidden;
    max-height: 0;
    background-color: #ff5c61;
    transition: max-height 0.3s ease;
    padding-left: 20px;
}

.menu_nesting.is-open {
    max-height: 300px;
}

.menu_link--inside {
    padding: 10px 20px;
    display: block;
    color: white;
}

.menu_link--inside:hover {
    background-color: #ff8083;
}
</style>