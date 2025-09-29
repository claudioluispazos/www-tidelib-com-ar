import axios from 'axios'

const API_BASE_URL = 'http://www-tidelib-com-ar-api.localhost/api'

class GeneroService {
    async getGeneros() {
        try {
            const response = await axios.get(`${API_BASE_URL}/generos`)
            return response.data
        } catch (error) {
            console.error('Error fetching generos:', error)
            throw error
        }
    }

    async getGeneroById(id) {
        try {
            const response = await axios.get(`${API_BASE_URL}/generos/${id}`)
            return response.data
        } catch (error) {
            console.error('Error fetching genero:', error)
            throw error
        }
    }
}

export default new GeneroService()
