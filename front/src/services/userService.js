import { userEndpoint } from '../config';
import customFetch from './customFetchService';

class UserServiceApi {
    constructor() {
        this.userEndpoint = userEndpoint;
        this.headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
        }
    }

    async userRegister(user) {
        const uri = this.userEndpoint.userRegister;
        const userBody = {
            name: user.name,
            email: user.email,
            password: user.password,
            password_confirmation: user.passwordConfirmation,
        };

        try {
            const response = await customFetch(uri, {
                method: 'POST',
                headers: this.headers,
                body: JSON.stringify(userBody)
            });

            if (!response || !response.success) {
                return { success: false, message: response?.message || "Error en registro" };
            }

            return { success: true, data: response };
        } catch (error) {
            console.error(error);
            return { success: false, message: "Error en la petición de registro" };
        }
    }

    async emailVerify(user) {
        const uri = this.userEndpoint.emailVerify;
        const verifyBody = { 
            email: user.email,
            code: user.code
        };

        try {
            const response = await customFetch(uri, {
                method: 'POST',
                headers: this.headers,
                body: JSON.stringify(verifyBody)
            });

            if (!response || !response.success) {
                return { success: false, message: response?.message || "Error en recuperación de contraseña" };
            }

            return { success: true, data: response };
        } catch (error) {
            console.error(error);
            return { success: false, message: "Error en la petición de recuperación" };
        }
    }

    async passwordRecovery(user) {
        const uri = this.userEndpoint.passwordRecovery;
        const recoveryBody = { email: user.email };

        try {
            const response = await customFetch(uri, {
                method: 'POST',
                headers: this.headers,
                body: JSON.stringify(recoveryBody)
            });

            if (!response || !response.success) {
                return { success: false, message: response?.message || "Error en recuperación de contraseña" };
            }

            return { success: true, data: response };
        } catch (error) {
            console.error(error);
            return { success: false, message: "Error en la petición de recuperación" };
        }
    }

    async resetPassword(user) {
        const uri = this.userEndpoint.resetPassword;
        const resetBody = {
            email: user.email,
            code: user.code,
            password: user.password,
            password_confirmation: user.passwordConfirmation
        };

        try {
            const response = await customFetch(uri, {
                method: "POST",
                headers: this.headers,
                body: JSON.stringify(resetBody)
            });

            if (!response || !response.success) {
                return { success: false, message: response?.message || "Error al resetear contraseña" };
            }

            return { success: true, data: response };
        } catch (error) {
            console.error(error);
            return { success: false, message: "Error en la petición" };
        }
    }
}

export default UserServiceApi;
