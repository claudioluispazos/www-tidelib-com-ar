import { authEndpoints } from "../config";
import router from "../router";

class AuthServiceApi {
    constructor() {
        this.authEndpoints = authEndpoints;
    }

    getToken() {
        return localStorage.getItem("token");
    }

    setToken(token) {
        localStorage.setItem("token", token);
    }

    removeToken() {
        localStorage.removeItem("token");
    }

    setUser(user) {
        localStorage.setItem("user", JSON.stringify(user));
    }

    getUser() {
        const user = localStorage.getItem("user");
        return user ? JSON.parse(user) : null;
    }

    removeUser() {
        localStorage.removeItem("user");
    }

    async authLogin(email, password) {
        const uri = this.authEndpoints.authLogin;

        try {
            const response = await fetch(uri, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ email, password }),
            });

            const data = await response.json();

            if (data.success && data.data.token) {
                this.setToken(data.data.token);
                this.setUser(data.data.user);
            }

            return { status: response.status, data };
        } catch (error) {
            console.error("Error en login:", error);
            throw error;
        }
    }

    logout() {
        this.removeToken();
        this.removeUser();
        router.push({ name: "login" });
    }

    isAuthenticated() {
        return !!this.getToken();
    }
}

export default AuthServiceApi;
