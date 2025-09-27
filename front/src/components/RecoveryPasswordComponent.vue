<template>
    <div class="modal fade" :class="{ 'd-block': modal, 'show': modal }" v-if="modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Recuperar contraseña</h1>
                    <button type="button" class="btn-close" @click="closeModal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="email" class="form-control" id="recipient-name"
                                placeholder="email_example@hotmail.com" v-model="email" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" @click="clickRecovery">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import Swal from "sweetalert2";
import { ref, defineProps, defineEmits } from "vue";
import router from "../router";
import UserServiceApi from '../services/userService';

const props = defineProps({
    modal: Boolean
});

const emit = defineEmits(['close']);

const userService = new UserServiceApi();
const email = ref('');
const isLoadingRef = ref(false);

const closeModal = () => {
    emit('close');
}

const clickRecovery = async (e) => {
    e.preventDefault();
    isLoadingRef.value = true;
    try {
        await recoveryPassword();
    } catch (error) {
        isLoadingRef.value = false;
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, reintenta la verificación.'
        });
    }
};

const recoveryPassword = async () => {
    try {
        const recovery = await userService.passwordRecovery({ email: email.value });
        console.log(recovery);
        if (recovery) {
            router.push({ name: 'reset' });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Reintenta la verificación.'
            });
        }
    } catch (error) {
        console.error('Error en la recuperación de contraseña:', error);
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Hubo un problema al intentar recuperar la contraseña.'
        });
    } finally {
        isLoadingRef.value = false;
    }
};
</script>

<style scoped></style>