import { createApp } from 'vue';
import './style.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.min.js';
import App from './App.vue';
import router from './router';
import { createPinia } from 'pinia';
import { OhVueIcon, addIcons } from "oh-vue-icons";
import { MdMenu, MdKeyboardarrowdown, BiSearch, GiShoppingCart, FaUserCircle, MdArrowdropdownRound, LaCopyright, GiWhiteBook, GiBookCover, GiBookshelf, FaChild, HiSolidChatAlt2, IoChatbubbles, FaHeadphonesAlt, FaHandHoldingUsd, MdDashboard, MdGroups, MdBordercolor, MdHomeRound, FaUser, GiPadlock, MdEmail, RiLockPasswordLine } from "oh-vue-icons/icons";

addIcons(MdMenu, MdKeyboardarrowdown, BiSearch, GiShoppingCart, FaUserCircle, MdArrowdropdownRound, LaCopyright, GiWhiteBook, GiBookCover, GiBookshelf, FaChild, HiSolidChatAlt2, IoChatbubbles, FaHeadphonesAlt, FaHandHoldingUsd, MdDashboard, MdGroups, MdBordercolor, MdHomeRound, FaUser, GiPadlock, MdEmail, RiLockPasswordLine);

const app = createApp(App);
const pinia = createPinia();

app.component("v-icon", OhVueIcon);
app.use(router).use(pinia).mount('#app');
