<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Autor;

class TidelibController extends Controller
{
    public function cargar_autor(Request $request)
    {
        $autor = Autor::create(
                $request->only([
                    'nombre',
                    'apellido',
                    'email',
                    'nacionalidad'
            ]));
        $autor->users()->attach(auth()->id());

        return $this->index();
    }
    public function sinacceso()
    {
        return view('sinacceso');
    }

    public function perfil_descripcion($libro_id)
    {
        $libro = Libro::find($libro_id);  
        return view('perfil_descripcion', ["libro" => $libro]);
    }
    public function formulario_correctores()
    {
        return view('formulario_correctores');
    }
    public function correo()
    {
        return view('correo');
    }
    public function contacto()
    {
        return view('contacto');
    }
    public function vision_y_objetivo()
    {
        return view('vision_y_objetivo');
    }
    public function patrocinar_obra()
    {
        return view('patrocinar_obra');
    }
    public function intercambio(): string
    {
        return view('intercambio');
    }
    public function cargar_obra()
    {
        return view('cargar_obra');
    }
    public function correctores()
    {
        return view('correctores');
    }
    public function editoriales()
    {
        return view('editoriales',
        [
            "editoriales_data" => 
            [ 
                [   "ideditorial" => "1",
                    "Nombre" => "tinta de luz",
                    "teléfono" => "3333-4444",
                    "whatsapp" => "11-1122334455",
                    "Correo" => "info@editorial.com.ar",
                    "sitio web" => "www.tintadeluz.com.ar",
                    "direccion" => "Salta 1037, Godoy Cruz- Mendoza - Argentina",
                    "img_logo" => "",
                ],
                [    "ideditorial" => "2",
                    "Nombre" => "tinta de luzes",
                    "teléfono" => "3333-4444",
                    "whatsapp" => "11-1122334455",
                    "Correo" => "info@editorial.com.ar",
                    "sitio web" => "www.tintadeluz.com.ar",
                    "direccion" => "Salta 1037, Godoy Cruz- Mendoza - Argentina",
                    "img_logo" => "",
                ],
            ]
        ]
    );
    }
    public function index()
    {
        return view('index', 
        [
            "carrousel_data" => Libro::all(),
            "portadas_c_data" => Libro::all(),
            "zocalo_data" => Libro::all()
        ]);
    }

}
