<template>
    <div class="modal fade" :class="{ 'd-block': modal, 'show': modal }" v-if="modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Verificación de email</h1>
                    <button type="button" class="btn-close" @click="closeModal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="verify-code" class="col-form-label">Código de verificación:</label>
                            <input type="text" class="form-control" id="verify-code" v-model="code" required />
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" @click="clickVerify" :disabled="isLoadingRef">
                                <span v-show="!isLoadingRef">Verificar</span>
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                                    v-show="isLoadingRef"></span>
                                <span v-show="isLoadingRef">Verificando...</span>
                            </button>
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
import UserServiceApi from "../services/userService";

const props = defineProps({
    modal: Boolean,
    email: { type: String, required: true },
});

const emit = defineEmits(["close"]);

const userService = new UserServiceApi();
const code = ref("");
const isLoadingRef = ref(false);

const closeModal = () => {
    emit("close");
};

const clickVerify = async (e) => {
    e.preventDefault();
    isLoadingRef.value = true;
    try {
        await verifyEmail();
    } catch (error) {
        isLoadingRef.value = false;
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Por favor, reintenta la verificación.",
        });
    }
};

const verifyEmail = async () => {
    try {
        const verify = await userService.emailVerify({
            email: props.email,
            code: code.value,
        });

        if (verify.success) {
            Swal.fire({
                icon: "success",
                title: "Cuenta verificada",
                text: "Tu cuenta ha sido activada con éxito.",
            }).then(() => {
                closeModal();
                router.push({ name: "login" });
            });
        } else {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: verify.message || "Código incorrecto, intenta de nuevo.",
            });
        }
    } catch (error) {
        console.error("Error en verificación de email:", error);
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Hubo un problema al intentar verificar tu cuenta.",
        });
    } finally {
        isLoadingRef.value = false;
    }
};
</script>


<style scoped></style>