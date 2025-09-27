<template>
    <div class="login-container">
        <div class="login-left">
            <img src="../assets/logo/t_roja_fondo_color.png" alt="logo" class="logo" />
            <h1 class="title">Crea tu cuenta</h1>
            <div class="line"></div>
            <p class="subtitle">
                Ya tienes una cuenta?
                <router-link :to="{ name: 'login' }">Inicia sesión</router-link>
            </p>
            <form class="login-form">
                <div class="input-group" :class="{ 'has-value': name !== '' }">
                    <input type="text" placeholder=" " id="name" v-model="name" @input="resetError('name')" />
                    <label for="name" class="form-label">Nombre</label>
                    <v-icon name="fa-user" scale="1.5" class="icon" />
                </div>
                <div class="input-group" :class="{ 'has-value': email !== '' }">
                    <input type="email" placeholder=" " id="email" v-model="email" @input="resetError('email')" />
                    <label for="email" class="form-label">Email</label>
                    <v-icon name="md-email" scale="1.5" class="icon" />
                </div>
                <div class="input-group" :class="{ 'has-value': password !== '' }">
                    <input type="password" placeholder=" " id="password" v-model="password"
                        @input="resetError('password')" />
                    <label for="password" class="form-label">Password</label>
                    <v-icon name="gi-padlock" scale="1.5" class="icon" />
                </div>
                <div class="input-group" :class="{ 'has-value': passwordConfirmation !== '' }">
                    <input type="password" placeholder=" " id="password_confirmation" v-model="passwordConfirmation"
                        @input="resetError('password')" />
                    <label for="password_confirmation" class="form-label">Confirmar Password</label>
                    <v-icon name="gi-padlock" scale="1.5" class="icon" />
                </div>
            </form>
            <button type="button" class="btn btn-danger" @click="onClick" :disabled="isLoadingRef">
                <span v-show="!isLoadingRef">Registrar</span>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                    v-show="isLoadingRef"></span>
                <span v-show="isLoadingRef">Registrando...</span>
            </button>
            <p style="color: #ff0000; margin: auto;">{{ authError }}</p>
        </div>
        <div class="login-right"></div>

        <EmailVerifyModal :modal="showVerifyModal" :email="email" @close="showVerifyModal = false" />
    </div>
</template>

<script setup>
import { onBeforeUnmount, onMounted, ref } from 'vue';
import UserServiceApi from '../services/userService';
import Swal from 'sweetalert2';
import EmailVerifyModal from './EmailVerifyModal.vue';

const userService = new UserServiceApi();

const name = ref('');
const email = ref('');
const password = ref('');
const passwordConfirmation = ref('');

const authError = ref('');
const isLoadingRef = ref(false);
const showVerifyModal = ref(false);

const onClick = async (e) => {
    e.preventDefault();

    if (!name.value || !email.value || !password.value || !passwordConfirmation.value) {
        authError.value = "Todos los datos son obligatorios";
        return;
    }

    if (password.value !== passwordConfirmation.value) {
        authError.value = "Las contraseñas no coinciden";
        return;
    }

    isLoadingRef.value = true;
    try {
        const { success, message } = await userService.userRegister({
            name: name.value,
            email: email.value,
            password: password.value,
            passwordConfirmation: passwordConfirmation.value
        });

        if (!success) {
            authError.value = message;
        } else {
            Swal.fire({
                icon: 'info',
                title: 'Registro exitoso',
                text: 'Tu cuenta se ha creado correctamente. Por favor, verifica tu correo electrónico para activar tu cuenta.',
                confirmButtonText: 'Aceptar'
            }).then(() => {
                showVerifyModal.value = true;
            });
        }
    } catch (error) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Ocurrió un error durante el registro. Por favor, intenta nuevamente.'
        });
        console.error(error);
    } finally {
        isLoadingRef.value = false;
    }
};

const resetError = () => {
    authError.value = '';
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
    display: grid;
    flex-direction: column;
    grid-template-columns: auto auto;
    gap: 30px;
    margin: 50px;
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

.btn {
    width: 100%;
    padding: 10px;
    margin: 0 50px;
}

.login-right {
    width: 70%;
    transform: translateX(45%);
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

@media screen and (max-width: 1300px) {
    .title {
        color: #e63946;
    }
}

@media screen and (max-width: 1000px) {
    .logo {
        width: 70px;
        margin: 10px -40px;
    }

    .title {
        color: #fff;
        font-size: 50px;
        font-weight: 800;
        margin: 50px 100px 0 100px;
        text-align: center;
    }

    .line {
        width: 100%;
        margin: 10px 0;
    }

    .subtitle {
        width: 100%;
        height: 50px;
        font-size: 18px;
        margin: -12px auto auto 0;
        padding: 10px 150px;
        font-weight: 700;
        color: #fff;
        /* background-color: rgba(230, 57, 71, .5); */
    }

    .subtitle a {
        color: #e63946;
        font-weight: 600;
        text-decoration: none;
    }

    .login-form {
        width: 100%;
        grid-template-columns: auto;
        gap: 50px;
        margin: 100px 0 0 40px;
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

    .btn {
        width: 100%;
        padding: 10px;
        margin: 70px 40px;
    }

    .login-right {
        width: 100%;
        transform: translateX(0%);
        background-image: url("../assets/books-banner.jpg");
    }
}

@media screen and (max-width: 600px) {
    .logo {
        width: 70px;
        margin: 10px -40px;
    }

    .title {
        color: #fff;
        font-size: 50px;
        font-weight: 800;
        margin: 40px 0 0 -20px;
        text-align: center;
    }

    .line {
        width: 100%;
        margin: 10px 0;
    }

    .subtitle {
        width: 100%;
        height: 50px;
        font-size: 14px;
        margin: -12px auto auto 0;
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
        grid-template-columns: auto;
        gap: 30px;
        margin: 40px 0 0 0;
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

    .btn {
        width: 100%;
        padding: 10px;
        margin: 40px 0;
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
        font-size: 40px;
        font-weight: 800;
        margin: 0 0 0 -20px;
        text-align: center;
    }

    .line {
        width: 100%;
        margin: 10px 0;
    }

    .subtitle {
        width: 100%;
        height: 50px;
        font-size: 14px;
        margin: -12px auto auto 0;
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
        grid-template-columns: auto;
        gap: 20px;
        margin: 40px 0 0 0;
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

    .btn {
        width: 100%;
        padding: 10px;
        margin: 40px 0;
    }

    .login-right {
        width: 100%;
        transform: translateX(0%);
        background-image: url("../assets/books-banner.jpg");
    }
}
</style>
