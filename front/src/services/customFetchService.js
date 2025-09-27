import { snakeToCamel } from "../helpers/api-format-obj";
import AuthServiceApi from "./authService";

const customFetch = async (uri, request = {}) => {
    const authApi = new AuthServiceApi();
    const token = authApi.getToken();

    if (!request.headers) {
        request.headers = {};
    }

    request.headers["Content-Type"] = "application/json";
    request.headers["Accept"] = "application/json";

    if (token) {
        request.headers["Authorization"] = `Bearer ${token}`;
    }

    try {
        const response = await fetch(uri, request);
        const data = await response.json();
        const camelCaseData = snakeToCamel(data);
        return camelCaseData;
    } catch (error) {
        console.error("Error en customFetch:", error);
        throw error;
    }
};

export default customFetch;
