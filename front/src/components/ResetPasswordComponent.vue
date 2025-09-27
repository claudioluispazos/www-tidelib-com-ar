<template>
    <div class="body__container">
        <div class="box__main">
            <div class="container fadeIn">
                <h1 class="title">Recuperar Contraseña</h1>
                <div class="login-form fadeIn">
                    <div class="box mx-auto" :class="{ 'has-value': email !== '' }">
                        <label class="form-label">
                            <v-icon name="md-email" scale="1" />
                            Email
                        </label>
                        <input type="text" class="form-control" v-model="email" @input="resetError('email')" />
                    </div>
                    <div class="box mx-auto" :class="{ 'has-value': code !== '' }">
                        <label class="form-label">
                            <v-icon name="ri-lock-password-line" scale="1" />
                            Código
                        </label>
                        <input type="text" class="form-control" v-model="code" @input="resetError('code')" />
                    </div>
                    <div class="box mx-auto" :class="{ 'has-value': password !== '' }">
                        <label class="form-label">
                            <v-icon name="gi-padlock" scale="1" />
                            Contraseña
                        </label>
                        <input type="password" class="form-control" v-model="password"
                            @input="resetError('password')" />
                    </div>
                    <div class="box mx-auto" :class="{ 'has-value': passwordConfirmation !== '' }">
                        <label class="form-label">
                            <v-icon name="gi-padlock" scale="1" />
                            Repetir Contraseña
                        </label>
                        <input type="password" class="form-control" v-model="passwordConfirmation"
                            @input="resetError('passwordConfirmation')" />
                    </div>
                    <p class="text-validation" style="color: #ff0000; text-align: center;">{{ passwordError }}</p>
                    <p style="color: #ff0000; text-align: center;">{{ authError }}</p>
                    <button class="btn btn-outline-danger" @click="clickReset" :disabled="isLoadingRef">
                        <span v-show="!isLoadingRef">Recuperar Contraseña</span>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                            v-show="isLoadingRef"></span>
                        <span v-show="isLoadingRef">Recuperando...</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import Swal from 'sweetalert2';
import UserServiceApi from '../services/userService';

const userService = new UserServiceApi();
const router = useRouter();

const email = ref('');
const code = ref('');
const password = ref('');
const passwordConfirmation = ref('');
const isLoadingRef = ref(false);
const passwordError = ref('');
const authError = ref('');

const clickReset = async (e) => {
    e.preventDefault();
    isLoadingRef.value = true;

    try {
        await resetPassword();
    } catch (error) {
        isLoadingRef.value = false;
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, reintenta la verificación.'
        });
    }
};

const resetPassword = async () => {
    isLoadingRef.value = true;
    passwordError.value = '';
    authError.value = '';

    try {
        if (password.value !== passwordConfirmation.value) {
            passwordError.value = 'Las contraseñas no coinciden.';
            return;
        }

        const response = await userService.resetPassword({
            email: email.value,
            code: code.value,
            password: password.value,
            passwordConfirmation: passwordConfirmation.value
        });

        if (response.success) {
            await router.push({ name: 'login' });
        } else {
            authError.value = response.message || 'No se pudo recuperar la contraseña. Verifica el código e inténtalo de nuevo.';
        }
    } catch (error) {
        authError.value = 'Ocurrió un error al recuperar la contraseña. Inténtalo de nuevo más tarde.';
        console.error(error);
    } finally {
        isLoadingRef.value = false;
    }
};

const resetError = (field) => {
    if (field === 'password' || field === 'passwordConfirmation') {
        passwordError.value = '';
    }
    authError.value = '';
};
</script>

<style scoped>
.body__container {
    width: 100%;
    height: 100vh;
    background-image: url(../assets/books-background.jpg);
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
}

.container {
    width: 60%;
    margin: auto;
}

.title {
    font-size: 70px;
    font-weight: 800;
    padding: 50px 10px 0 50px;
}

.login-form {
    width: 70%;
    gap: 10px;
    margin: 50px auto;
    z-index: 10;
}

.box {
    margin: 20px auto;
}

/* ------------------------------------------------ */
/* ---------------- CODE RESPOSIVE ---------------- */
/* ------------------------------------------------ */

@media screen and (max-width: 1024px) {
    .body__container {
        width: 100%;
        height: 100vh;
        background-image: url(../assets/books-background.jpg);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .container {
        width: 100%;
        margin: auto;
    }

    .title {
        font-size: 50px;
        font-weight: 800;
        padding: 50px 10px 0 10px;
    }

    .login-form {
        width: 80%;
        gap: 10px;
        margin: 50px auto;
        z-index: 10;
    }

    .btn {
        margin-top: 20px;
        color: #fff;
        background-color: #e63946;
    }
}
</style>