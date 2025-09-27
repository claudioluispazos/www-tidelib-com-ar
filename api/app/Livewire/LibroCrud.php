<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Libro;
use App\Models\Autor;
use App\Models\Genero;
use App\Models\Editorial;

class LibroCrud extends Component
{
    use WithPagination, WithFileUploads;

    public $titulo, $isbn, $idioma, $precio, $imagen_portada, $autor_id, $genero_id, $editorial_id, $sinopsis, $libroId;
    public $modal = false;
    public $errorMessage = null; // Agregado para el mensaje de error
    public $name = 'Mis Obras';
    public $autorSeleccionado;
    public $imagen_portada_original; // Nueva propiedad para almacenar el valor original

    protected function rules()
    {
        $rules = [
            'titulo'        => 'required|string|max:255',
            'isbn'          => 'required|string|max:255|unique:libros,isbn,' . $this->libroId,
            'idioma'        => 'required|string',
            'precio'        => 'required|numeric|min:0',
            'genero_id'     => 'required|exists:generos,id',
            'editorial_id'  => 'required|exists:editorials,id',
            'sinopsis'      => 'required|string',
        ];
        
        // Si estamos editando un libro, la imagen solo se valida si se sube una nueva
        if ($this->libroId) {
            if ($this->imagen_portada instanceof \Illuminate\Http\UploadedFile) {
                $rules['imagen_portada'] = 'image|max:2048';
            }
        } else {
            // Si estamos creando un libro, la imagen es obligatoria
            $rules['imagen_portada'] = 'required|image|max:2048';
        }
            
        return $rules;
    }
    
    public function mount()
    {
        $this->autorSeleccionado = auth()->user()->autors->first()?->id;
    }

    public function render()
    {
        $autorIds = auth()->user()->autors->pluck('id')->toArray();
    
        return view('livewire.libro-crud', [
            'libros'     => Libro::with(['autor', 'genero', 'editorial'])
                            ->when($this->autorSeleccionado, fn($query) => $query->where('autor_id', $this->autorSeleccionado))
                            ->paginate(10),
            'autores'    => Autor::whereIn('id', $autorIds)->get(),
            'generos'    => Genero::all(),
            'editoriales'=> Editorial::all(),
        ])->layout('layouts.tidelib');
    }

    public function updatedAutorSeleccionado()
    {
        $this->resetPage();
    }

    public function create()
    {
        $this->resetInputFields();
        $this->resetValidation();
        $this->errorMessage = null; // Reseteamos el mensaje de error al crear
        $this->modal = true;
    }

    public function store()
    {
        // Validamos con las reglas definidas dinámicamente
        $this->validate($this->rules());
    
        // Preparamos los datos para guardar o actualizar
        $data = $this->prepareData();

        // Guardamos o actualizamos el libro
        Libro::updateOrCreate(['id' => $this->libroId], $data);
        $this->modal = false;
        $this->resetInputFields();
    }
        
    public function edit($id)
    {
        $this->resetValidation();
        $libro = Libro::findOrFail($id);
        $this->fill($libro->toArray());
        $this->imagen_portada_original = $libro->getRawOriginal('imagen_portada'); // Guardamos el valor original
        $this->libroId = $id;
        $this->modal = true;
    }

    public function delete($id)
    {
        try {
            Libro::findOrFail($id)->delete();
        } catch (\Exception $e) {
            $this->errorMessage = "No se pudo eliminar el libro: " . $e->getMessage();
        }
    }

    private function resetInputFields()
    {
        $this->titulo = $this->isbn = $this->idioma = $this->precio = $this->imagen_portada = null;
        $this->autor_id = $this->genero_id = $this->editorial_id = $this->sinopsis = $this->libroId = null;
    }

    private function prepareData()
    {
        $data = $this->only(['titulo', 'isbn', 'idioma', 'precio', 'autor_id', 'genero_id', 'editorial_id', 'sinopsis']);
        $data['autor_id'] = $this->autorSeleccionado;

        // Si se sube una nueva imagen, la almacenamos
        if ($this->imagen_portada instanceof \Illuminate\Http\UploadedFile) {
            $data['imagen_portada'] = $this->imagen_portada->store('portadas', 'public');
        } else {
            // Si no se sube una nueva imagen, usamos el valor original almacenado
            $data['imagen_portada'] = $this->imagen_portada_original;
        }

        return $data;
    }
}
