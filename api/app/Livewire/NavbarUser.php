<?php

namespace App\Livewire;

use Livewire\Component;
use App\Livewire\Actions\Logout; // Asegúrate de que esta clase exista y esté configurada

class NavbarUser extends Component
{
    // Puedes aceptar un parámetro para el ID del dropdown (opcional)
    public $dropdownId;

    public function mount($dropdownId = 'userDropdown')
    {
        $this->dropdownId = $dropdownId;
    }

    /**
     * Cierra la sesión del usuario y redirige a la página principal.
     */
    public function logout(Logout $logout): void
    {
        $logout(); // Ejecuta la acción de logout (esto podría llamar a auth()->logout() internamente)
        $this->redirect('/', navigate: true);
    }

    public function render()
    {
        return view('livewire.navbar-user');
    }
}
