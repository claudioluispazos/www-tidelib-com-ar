<?php

namespace App\Http\Controllers;

use App\Models\Genero;
use App\Models\Libro;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        $carouselData = Libro::all(); // O tu lógica específica para el carrusel
        $mostViewedData = Libro::all(); // orderBy('vistas', 'desc')->take(5)->get();
        $booksData = Libro::paginate(20);
        $generosData = Genero::all(); // O tu lógica específica para los géneros

        // Pasar los datos a la vista
        return view('home', compact('carouselData', 'mostViewedData', 'booksData', 'generosData'));
    }
}
