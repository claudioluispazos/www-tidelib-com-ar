export const basePathUrl = 'https://tidelib.com.ar/api';

export const authEndpoints = Object.freeze({
    authLogin: `${basePathUrl}/login`
});

export const userEndpoint = Object.freeze({
    userRegister: `${basePathUrl}/auth/register`,
    emailVerify: `${basePathUrl}/auth/email/verify`,
    passwordRecovery: `${basePathUrl}/auth/forgot-password`,
    resetPassword: `${basePathUrl}/auth/reset-password`
});

export const genderEndpoint = Object.freeze({
    allGender: `${basePathUrl}/generos`,
    createGender: `${basePathUrl}/generos`,
    idGender: `${basePathUrl}/generos/:id`,
    editGender: `${basePathUrl}/generos/:id`,
    deleteGender: `${basePathUrl}/generos/:id`
});

export const booksEndpoint = Object.freeze({
    allBooks: `${basePathUrl}/libros`,
    createBook: `${basePathUrl}/libros`,
    idBook: `${basePathUrl}/libros/:id`,
    editBook: `${basePathUrl}/libros/:id`,
    deleteBook: `${basePathUrl}/libros/:id`,
    carousel: `${basePathUrl}/libros/carousel`,
    mostViewed: `${basePathUrl}/libros/most-viewed`
})

export const version = 'v 0.0.1';