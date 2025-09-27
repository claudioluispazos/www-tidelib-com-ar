<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBar extends Component
{
    public $query = '';
    public $showResults = false;
    public $results = [];

    public function updatedQuery()
    {
        $this->showResults = !empty($this->query);
        $this->results = $this->search(); // Ahora sí asignamos el resultado correctamente-
    }

    private function search()
    {
        // Simulación de búsqueda en base de datos
        $data = [
            'El principito',
            'Cien años de soledad',
            'Don Quijote de la Mancha',
            '1984',
            'Crimen y castigo',
        ];

        return array_filter($data, function ($book) {
            return stripos($book, $this->query) !== false;
        });
    }

    public function render()
    {
        return view('livewire.search-bar');
    }
}
