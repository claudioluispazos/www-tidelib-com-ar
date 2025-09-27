import { genderEndpoint } from "../config";

class GenderServiceApi {
    constructor() {
        this.genderEndpoint = genderEndpoint;
        this.headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
        };
    }

    async allGender() {
        const uri = genderEndpoint.allGender;
        try {
            const rawResponse = await fetch(uri, {
                method: 'GET',
                headers: this.headers
            });
            const response = await rawResponse.json();
            console.log(response);
            return response;
        } catch (error) {
            console.error("Error fetching gender:", error);
            throw error;
        }
    }
}

export default GenderServiceApi;