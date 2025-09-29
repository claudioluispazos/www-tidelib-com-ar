import axios from 'axios'

const API_BASE_URL = 'http://www-tidelib-com-ar-api.localhost/api'

class LibroService {
    // Función para construir URL completa de imagen
    buildImageUrl(imagePath) {
        if (!imagePath) return null
        
        // Si ya es una URL completa, devolverla tal como está
        if (imagePath.startsWith('http')) {
            return imagePath
        }
        
        // Construir URL completa
        const baseUrl = 'http://www-tidelib-com-ar-api.localhost'
        return baseUrl + imagePath
    }

    // Función para procesar los datos del libro y construir URLs de imágenes
    processLibroData(libro) {
        if (libro.imagen_portada) {
            libro.imagen_portada = this.buildImageUrl(libro.imagen_portada)
        }
        return libro
    }

    // Función para procesar una lista de libros
    processLibrosData(libros) {
        return libros.map(libro => this.processLibroData(libro))
    }

    async getLibros(params = {}) {
        try {
            const response = await axios.get(`${API_BASE_URL}/libros`, { params })
            if (response.data.data && response.data.data.data) {
                response.data.data.data = this.processLibrosData(response.data.data.data)
            }
            return response.data
        } catch (error) {
            console.error('Error fetching libros:', error)
            throw error
        }
    }

    async getLibroById(id) {
        try {
            const response = await axios.get(`${API_BASE_URL}/libros/${id}`)
            if (response.data.data) {
                response.data.data = this.processLibroData(response.data.data)
            }
            return response.data
        } catch (error) {
            console.error('Error fetching libro:', error)
            throw error
        }
    }

    async getLibrosByGenero(generoId, params = {}) {
        try {
            const response = await axios.get(`${API_BASE_URL}/libros`, { 
                params: { ...params, genero_id: generoId }
            })
            if (response.data.data && response.data.data.data) {
                response.data.data.data = this.processLibrosData(response.data.data.data)
            }
            return response.data
        } catch (error) {
            console.error('Error fetching libros by genero:', error)
            throw error
        }
    }

    async searchLibros(searchTerm, params = {}) {
        try {
            const response = await axios.get(`${API_BASE_URL}/libros`, { 
                params: { ...params, search: searchTerm }
            })
            if (response.data.data && response.data.data.data) {
                response.data.data.data = this.processLibrosData(response.data.data.data)
            }
            return response.data
        } catch (error) {
            console.error('Error searching libros:', error)
            throw error
        }
    }
}

export default new LibroService()
