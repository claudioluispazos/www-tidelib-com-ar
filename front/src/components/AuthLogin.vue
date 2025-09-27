<template>
    <div class="login-container">
        <div class="login-left">
            <img src="../assets/logo/t_roja_fondo_color.png" alt="logo" class="logo" />
            <h1 class="title">Bienvenido</h1>
            <div class="line"></div>
            <p class="subtitle">
                No tienes una cuenta?
                <router-link :to="{ name: 'register' }">Crea una ahora</router-link>
            </p>
            <form class="login-form">
                <div class="input-group" :class="{ 'has-value': username !== '' }">
                    <input type="text" placeholder=" " id="email" v-model="username" @input="resetError('email')" />
                    <label for="email" class="form-label">Email o Usuario</label>
                    <v-icon name="fa-user" scale="1.5" class="icon" />
                </div>
                <p class="text-validation" style="color: #ff0000; text-align: center;">{{ emailError }}</p>
                <div class="input-group" :class="{ 'has-value': password !== '' }">
                    <input type="password" placeholder=" " id="password" v-model="password"
                        @input="resetError('password')" />
                    <label for="password" class="form-label">Password</label>
                    <v-icon name="gi-padlock" scale="1.5" class="icon" />
                </div>
                <p class="text-validation" style="color: #ff0000; text-align: center;">{{ passwordError }}</p>
                <button type="button" class="btn btn-danger" @click="onClick" :disabled="isLoadingRef">
                    <span v-show="!isLoadingRef">Iniciar sesion</span>
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                        v-show="isLoadingRef"></span>
                    <span v-show="isLoadingRef">Iniciando...</span>
                </button>
                <p style="color: #ff0000; text-align: center;">{{ authError }}</p>
            </form>
            <button @click="showModal" class="forgot-password">Olvidaste tu contraseña?</button>
            <RecoveryPasswordComponent :modal="isModalVisible" @close="hideModal" />
        </div>
        <div class="login-right"></div>
    </div>
</template>

<script setup>
import { onBeforeUnmount, onMounted, ref } from 'vue';
import AuthServiceApi from '../services/authService';
import router from '../router';
import RecoveryPasswordComponent from './RecoveryPasswordComponent.vue';
import Swal from 'sweetalert2';

const authService = new AuthServiceApi();
const username = ref('');
const password = ref('');
const emailError = ref('');
const passwordError = ref('');
const authError = ref('');
const isLoadingRef = ref(false);
const isModalVisible = ref(false);

const showModal = () => {
    isModalVisible.value = true;
};

const hideModal = () => {
    isModalVisible.value = false;
};

const onClick = async (e) => {
    e.preventDefault();

    emailError.value = username.value === '' ? 'El email o usuario es obligatorio' : '';
    passwordError.value = password.value === '' ? 'La contraseña es obligatoria' : '';

    if (emailError.value || passwordError.value) return;

    isLoadingRef.value = true;
    try {
        await authLoginBtn();
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Ocurrió un error durante el inicio de sesión. Por favor, intenta nuevamente.'
        });
    } finally {
        isLoadingRef.value = false;
    }
};

const authLoginBtn = async () => {
    try {
        const { status, data } = await authService.authLogin(
            username.value,
            password.value,
        );
        if (!data.success || status >= 400) {
            handleAuthError(status, data.message);
        } else {
            await router.push({ name: 'home' });
        }
    } catch (error) {
        handleLoginError(error);
    }
};

const handleAuthError = (status, message) => {
    if (status === 422 || status === 403) {
        authError.value = message || 'Por favor revisa los datos ingresados';
    } else if (status === 500) {
        Swal.fire({
            icon: "error",
            title: "El servicio no se encuentra disponible por el momento",
            text: "Por favor reintente en unos minutos",
        });
    } else if (status === 401) {
        Swal.fire({
            title: "Revisa tu usuario y contraseña",
            text: "Si no estas registrado crea una cuenta",
            icon: "info",
            confirmButtonText: "Ok",
        }).then(() => {
            router.push({ name: 'signup' });
        });
    } else {
        authError.value = "Error de autenticación";
    }
};

const handleLoginError = (error) => {
    if (error.response && error.response.status === 500) {
        Swal.fire({
            icon: "error",
            title: "El servicio no se encuentra disponible por el momento",
            text: "Por favor reintente en unos minutos"
        });
    } else if (error.message === 'Failed to fetch') {
        Swal.fire({
            icon: "error",
            title: "Error de red.",
            text: "El servicio no se encuentra disponible por el momento. Por favor reintente en unos minutos"
        });
    } else {
        authError.value = "Login error";
        console.error("Error durante el login:", error);
    }
};

const resetError = (field) => {
    if (field === 'email') {
        emailError.value = '';
    } else if (field === 'password') {
        passwordError.value = '';
    }
};

onMounted(() => {
    document.body.style.overflow = 'hidden';
});

onBeforeUnmount(() => {
    document.body.style.overflow = '';
});
</script>

<style scoped>
.login-container {
    width: 100%;
    display: flex;
    height: 100vh;
    background: #fff;
    font-family: "Poppins", sans-serif;
}

.login-left {
    position: absolute;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    padding: 0 60px;
    z-index: 10;
}

.logo {
    width: 70px;
    margin: 20px;
}

.title {
    font-size: 70px;
    font-weight: 800;
    color: #e63946;
    margin: 50px 10px 0 50px;
}

.line {
    width: 100%;
    height: 8px;
    background: #e63946;
    margin: 20px;
}

.subtitle {
    font-size: 14px;
    margin: auto;
}

.subtitle a {
    color: #e63946;
    font-weight: 600;
    text-decoration: none;
}

.login-form {
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin: 50px 50px 0 50px;
    z-index: 10;
}

.input-group {
    position: relative;
    width: 100%;
}

.input-group input {
    width: 100%;
    height: 60px;
    padding: 20px 45px 10px 35px;
    border-radius: 8px;
    border: none;
    background: #f66b6b;
    color: #fff;
    font-size: 14px;
}

.input-group .form-label {
    position: absolute;
    left: 50px;
    top: 50%;
    transform: translateY(-50%);
    color: #fff;
    font-size: 14px;
    pointer-events: none;
    transition: 0.3s ease all;
}

.input-group input:focus+.form-label,
.input-group input:not(:placeholder-shown)+.form-label {
    top: 16px;
    font-size: 10px;
    color: #fff;
}

.input-group .icon {
    position: absolute;
    top: 50%;
    right: 12px;
    transform: translateY(-50%);
    color: #fff;
}

.forgot-password {
    display: flex;
    justify-content: end;
    border: none;
    background-color: transparent;
    margin-left: 450px;
    cursor: pointer;
    font-weight: 600;
    font-size: 14px;
    color: #fff;
}

.login-right {
    width: 80%;
    transform: translateX(25%);
    background-image: url("../assets/librery.png");
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
}


/* ------------------------------------------------ */
/* ---------------- CODE RESPOSIVE ---------------- */
/* ------------------------------------------------ */

@media screen and (height: 600px) {
    .logo {
        width: 80px;
        margin: 20px -50px;
    }

    .title {
        font-size: 70px;
        font-weight: 800;
        margin: -30px 10px 0 47px;
        color: #e63946;
    }
}

@media screen and (max-width: 1000px) {
    .logo {
        width: 80px;
        margin: 20px -50px;
    }

    .title {
        color: #fff;
        margin: 80px 10px 0 50px;
    }

    .subtitle {
        color: #fff;
        font-size: 18px;
        font-weight: 700;
    }

    .login-form {
        width: 100%;
        gap: 20px;
        margin: 100px 70px 0 70px;
    }

    .forgot-password {
        margin-left: 300px;
        font-weight: 800;
        font-size: 18px;
    }

    .login-right {
        width: 100%;
        transform: translateX(0%);
        background-image: url("../assets/books-banner.jpg");
    }
}

@media screen and (max-width: 600px) {
    .logo {
        margin: 10px -40px;
    }

    .title {
        color: #fff;
        font-size: 60px;
        font-weight: 800;
        margin: 80px 0 0 -30px;
    }

    .line {
        width: 100%;
        margin: 10px -10px;
    }

    .subtitle {
        width: 100%;
        height: 50px;
        font-size: 14px;
        margin: -12px auto auto -10px;
        padding: 10px;
        font-weight: 700;
        background-color: rgba(230, 57, 71, .5);
    }

    .subtitle a {
        color: #fff;
        font-weight: 700;
        text-decoration: none;
    }

    .login-form {
        width: 100%;
        gap: 20px;
        margin: 80px -10px 0 -10px;
        z-index: 20;
    }

    .input-group {
        position: relative;
        width: 100%;
    }

    .input-group input {
        width: 100%;
        height: 65px;
        font-size: 42px;
    }

    .input-group .form-label {
        left: 20px;
        font-size: 14px;
    }

    .forgot-password {
        font-size: 14px;
        margin-left: auto;
    }

    .login-right {
        width: 100%;
        transform: translateX(0%);
        background-image: url("../assets/books-banner.jpg");
    }
}

@media screen and (width: 540px) {
    .logo {
        width: 70px;
        margin: 10px -50px;
    }

    .title {
        color: #fff;
        font-size: 50px;
        font-weight: 800;
        margin: 82px 0 0 70px;
    }

    .line {
        width: 100%;
        margin: 10px 20px;
    }

    .subtitle {
        width: 100%;
        height: 50px;
        font-size: 14px;
        margin: -12px auto auto 20px;
        padding: 10px 80px;
        font-weight: 700;
        background-color: transparent;
    }

    .subtitle a {
        color: #e63946;
        font-weight: 700;
        text-decoration: none;
    }

    .login-form {
        width: 100%;
        gap: 20px;
        margin: 40px 20px 0 20px;
        z-index: 20;
    }

    .input-group {
        position: relative;
        width: 100%;
    }

    .input-group input {
        width: 100%;
        height: 50px;
        font-size: 12px;
    }

    .input-group .form-label {
        left: 20px;
        font-size: 12px;
    }

    .forgot-password {
        font-size: 12px;
        margin-left: 200px;
    }

    .login-right {
        width: 100%;
        transform: translateX(0%);
        background-image: url("../assets/books-banner.jpg");
    }
}

@media screen and (max-width: 400px) {
    .logo {
        width: 70px;
        margin: 10px -40px;
    }

    .title {
        color: #fff;
        font-size: 50px;
        font-weight: 800;
        margin: 82px 0 0 -20px;
    }

    .line {
        width: 100%;
        margin: 10px -10px;
    }

    .subtitle {
        width: 100%;
        height: 50px;
        font-size: 14px;
        margin: -12px auto auto -10px;
        padding: 10px;
        font-weight: 700;
        background-color: rgba(230, 57, 71, .5);
    }

    .subtitle a {
        color: #fff;
        font-weight: 600;
        text-decoration: none;
    }

    .login-form {
        width: 100%;
        gap: 10px;
        margin: 40px -10px 0 -10px;
        z-index: 20;
    }

    .input-group {
        position: relative;
        width: 100%;
    }

    .input-group input {
        width: 100%;
        height: 50px;
        font-size: 12px;
    }

    .input-group .form-label {
        left: 20px;
        font-size: 12px;
    }

    .forgot-password {
        font-size: 12x;
        margin-left: auto;
    }

    .login-right {
        width: 100%;
        transform: translateX(0%);
        background-image: url("../assets/books-banner.jpg");
    }
}

@media screen and (width: 344px) {
    .logo {
        width: 70px;
        margin: 10px -40px;
    }

    .title {
        color: #fff;
        font-size: 50px;
        font-weight: 800;
        margin: 82px 0 0 -40px;
    }

    .line {
        width: 100%;
        margin: 10px -20px;
    }

    .subtitle {
        width: 100%;
        height: 50px;
        font-size: 14px;
        margin: -12px auto auto -20px;
        padding: 10px;
        font-weight: 700;
        background-color: rgba(230, 57, 71, .5);
    }

    .subtitle a {
        color: #fff;
        font-weight: 600;
        text-decoration: none;
    }

    .login-form {
        width: 100%;
        gap: 10px;
        margin: 80px -10px 0 -10px;
        z-index: 20;
    }

    .input-group {
        position: relative;
        width: 100%;
    }

    .input-group input {
        width: 100%;
        height: 50px;
        font-size: 12px;
    }

    .input-group .form-label {
        left: 20px;
        font-size: 12px;
    }

    .forgot-password {
        font-size: 12x;
        margin-left: auto;
    }

    .login-right {
        width: 100%;
        transform: translateX(0%);
        background-image: url("../assets/books-banner.jpg");
    }
}
</style>
