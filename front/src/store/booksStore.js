import { defineStore } from "pinia";
import BooksServiceApi from "../services/booksServices";

const useBooksStore = defineStore("books", {
    state: () => ({
    booksList: [],
    bookData: {
        status: "",
        message: "",
        data: {
            items: [
                {
                    id: "",
                    titulo: "",
                    isbn: "",
                    idioma: "",
                    precio: "",
                    imagenPortada: "",
                    autorId: "",
                    generoId: "",
                    editorialId: "",
                    sinopsis: "",
                    createdAt: "",
                    updatedAt: "",
                },
            ],
        },
    },
    searchQuery: "",
    selectedGenre: null,
    booksCache: {},
    loadingStatus: false,
    }),
    getters: {
        getBooks: (state) => state.booksList,
        getSelectedBook: (state) => state.bookData,
        getIsLoadingStatus: (state) => state.loadingStatus,
        getSelectedBookCache: (state) => state.booksCache,
        filteredBooks() {
            return this.books.filter(book => {
                const matchGenre = !this.selectedGenre || book.genero_id === this.selectedGenre;
                const matchSearch = this.searchQuery === "" || book.titulo.toLowerCase().includes(this.searchQuery);
                return matchGenre && matchSearch;
            });
        },
    },
    actions: {
        async fetchAllBooks() {
            this.setIsLoadingStatus(true);
            try {
                const bookService = new BooksServiceApi();
                const data = await bookService.allBooks();
                this.booksList = data;
            } catch (error) {
                console.error("Error al obtener libros:", error);
            } finally {
                this.setIsLoadingStatus(false);
            }
        },
        async fetchBookDetail(id) {
            this.setIsLoadingStatus(true);
            try {
                const bookService = new BooksServiceApi();
                const response = await bookService.bookDetail(id);
                this.bookData = response.data;
            } catch (error) {
                console.error("Error al obtener detalles del libro:", error);
            } finally {
                this.setIsLoadingStatus(false);
            }
        },
        setSelectedBook(book) {
            this.bookData = book;
        },
        setIsLoadingStatus(value) {
            this.loadingStatus = value;
        },
        setSelectedGenre(genreId) {
            this.selectedGenre = genreId;
        },
        setSearchQuery(query) {
            this.searchQuery = query;
        }
    },
});

export default useBooksStore;
