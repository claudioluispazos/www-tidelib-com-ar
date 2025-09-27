import { booksEndpoint } from "../config";

class BooksServiceApi {
    constructor() {
        this.booksEndpoint = booksEndpoint;
        this.headers = {
            "Content-Type": "application/json",
            "Accept": "application/json",
        };
    }

    async allBooks() {
        const uri = booksEndpoint.allBooks;
        try {
            const response = await fetch(uri, {
                method: 'GET',
                headers: this.headers
            });

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const data = await response.json();
            return data;
        } catch (error) {
            console.error("Error fetching books:", error);
            throw error;
        }
    }

    async carouselBooks() {
        const uri = booksEndpoint.carousel;
        try {
            const response = await fetch(uri, {
                method: 'GET',
                headers: this.headers
            });
            const data = await response.json();
            console.log(data);
            return data;
        } catch (error) {
            console.error("Error fetching carousel books:", error);
            throw error;
        }
    }

    async mostViewed() {
        const uri = booksEndpoint.mostViewed;
        try {
            const response = await fetch(uri, {
                method: 'GET',
                headers: this.headers
            });
            const data = await response.json();
            console.log(data);
            return data;
        } catch (error) {
            console.error("Error fetching carousel books:", error);
            throw error;
        }
    }

    async bookDetail(id) {
        const uri = booksEndpoint.idBook.replace(':id', id);
        try {
            const response = await fetch(uri, {
                method: 'GET',
                headers: this.headers
            });
            const data = await response.json();
            console.log(data);
            return data;
        } catch (error) {
            console.error('Error al acceder a los detalles del libro', error);
            throw error;
        }
    }
}

export default BooksServiceApi;
