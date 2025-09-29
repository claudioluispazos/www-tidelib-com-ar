import { defineStore } from 'pinia'
import generoService from '../services/generoService'
import libroService from '../services/libroService'

export const useGeneroStore = defineStore('genero', {
    state: () => ({
        generos: [],
        selectedGenero: null,
        loading: false,
        error: null
    }),

    actions: {
        async fetchGeneros() {
            this.loading = true
            this.error = null
            try {
                const response = await generoService.getGeneros()
                this.generos = response.data.data || []
            } catch (error) {
                this.error = error.message
                console.error('Error fetching generos:', error)
            } finally {
                this.loading = false
            }
        },

        selectGenero(genero) {
            this.selectedGenero = genero
        },

        clearSelection() {
            this.selectedGenero = null
        }
    },

    getters: {
        getGeneroById: (state) => (id) => {
            return state.generos.find(genero => genero.id === id)
        }
    }
})

export const useLibroStore = defineStore('libro', {
    state: () => ({
        libros: [],
        featuredLibro: null,
        loading: false,
        error: null,
        pagination: null
    }),

    actions: {
        async fetchLibros(params = {}) {
            this.loading = true
            this.error = null
            try {
                const response = await libroService.getLibros(params)
                this.libros = response.data.data || []
                this.pagination = response.data
            } catch (error) {
                this.error = error.message
                console.error('Error fetching libros:', error)
            } finally {
                this.loading = false
            }
        },

        async fetchLibrosByGenero(generoId, params = {}) {
            this.loading = true
            this.error = null
            try {
                const response = await libroService.getLibrosByGenero(generoId, params)
                this.libros = response.data.data || []
                this.pagination = response.data
            } catch (error) {
                this.error = error.message
                console.error('Error fetching libros by genero:', error)
            } finally {
                this.loading = false
            }
        },

        async searchLibros(searchTerm, params = {}) {
            this.loading = true
            this.error = null
            try {
                const response = await libroService.searchLibros(searchTerm, params)
                this.libros = response.data.data || []
                this.pagination = response.data
            } catch (error) {
                this.error = error.message
                console.error('Error searching libros:', error)
            } finally {
                this.loading = false
            }
        },

        async fetchFeaturedLibro() {
            this.loading = true
            this.error = null
            try {
                const response = await libroService.getLibros({ per_page: 1 })
                this.featuredLibro = response.data.data?.[0] || null
            } catch (error) {
                this.error = error.message
                console.error('Error fetching featured libro:', error)
            } finally {
                this.loading = false
            }
        },

        setFeaturedLibro(libro) {
            this.featuredLibro = libro
        }
    },

    getters: {
        getLibroById: (state) => (id) => {
            return state.libros.find(libro => libro.id === id)
        }
    }
})
