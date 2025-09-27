<div>
    <div class="flex justify-between items-center mb-4">
        <x-primary-button wire:click="create">Nuevo Libro</x-primary-button>

        <!-- Selector de Autor -->
        <div>
            <x-input-label value="Filtrar por Autor" />
            <select wire:model.live="autorSeleccionado" class="border p-2 rounded">
                @foreach($autores as $autor)
                    <option value="{{ $autor->id }}">{{ $autor->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Mostrar error si existe -->
    @if($errorMessage)
        <div class="alert alert-danger">
            {{ $errorMessage }}
        </div>
    @endif

    <table class="table-auto w-full mt-4">
    <thead>
        <tr>
            <th>Portada</th><th>Título</th><th>Autor</th><th>Género</th><th>Precio</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($libros as $libro)
        <tr>
            <td>
                @if($libro->imagen_portada)
                    <img src="{{ asset($libro->imagen_portada) }}" alt="Portada" class="w-16 h-16 object-cover">
                @else
                    <span>No disponible</span>
                @endif
            </td>
            <td>{{ $libro->titulo }} - {{ $libro->isbn }}</td>
            <td>{{ $libro->autor->nombre ?? 'N/A' }}</td>
            <td>{{ $libro->genero->nombre ?? 'N/A' }}</td>
            <td>${{ number_format($libro->precio, 2) }}</td>
            <td>
                <x-secondary-button wire:click="edit({{ $libro->id }})">Editar</x-secondary-button>
                <x-danger-button wire:click="delete({{ $libro->id }})">Eliminar</x-danger-button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

    {{ $libros->links() }}

<!-- Modal -->
    @if($modal)
        <x-modal :name="$name" wire:model="modal">
            <x-slot name="title">{{ $libroId ? 'Editar Libro' : 'Nuevo Libro' }}</x-slot>
            <x-slot name="content">
                <!-- Título -->
                <x-input-label value="Título" />
                <x-text-input wire:model="titulo" />
                @error('titulo') <span class="text-red-500">{{ $message }}</span> @enderror

                <!-- ISBN -->
                <x-input-label value="ISBN" />
                <x-text-input wire:model="isbn" />
                @error('isbn') <span class="text-red-500">{{ $message }}</span> @enderror

                <!-- Idioma -->
                <x-input-label value="Idioma" />
                <x-text-input wire:model="idioma" />
                @error('idioma') <span class="text-red-500">{{ $message }}</span> @enderror

                <!-- Precio -->
                <x-input-label value="Precio" />
                <x-text-input wire:model="precio" type="number" />
                @error('precio') <span class="text-red-500">{{ $message }}</span> @enderror

                <!-- Imagen Portada -->
                <x-input-label value="Imagen Portada" />
                <input type="file" wire:model="imagen_portada" />
                @error('imagen_portada') <span class="text-red-500">{{ $message }}</span> @enderror

                <!-- Género -->
                <x-input-label value="Género" />
                <select wire:model="genero_id">
                    <option value="">Seleccione</option>
                    @foreach($generos as $genero)
                        <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
                    @endforeach
                </select>
                @error('genero_id') <span class="text-red-500">{{ $message }}</span> @enderror

                <!-- Editorial -->
                <x-input-label value="Editorial" />
                <select wire:model="editorial_id">
                    <option value="">Seleccione</option>
                    @foreach($editoriales as $editorial)
                        <option value="{{ $editorial->id }}">{{ $editorial->nombre }}</option>
                    @endforeach
                </select>
                @error('editorial_id') <span class="text-red-500">{{ $message }}</span> @enderror

                <!-- Sinopsis -->
                <x-input-label value="Sinopsis" />
                <textarea wire:model="sinopsis" rows="4" class="w-full"></textarea>
                @error('sinopsis') <span class="text-red-500">{{ $message }}</span> @enderror
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('modal', false)">Cancelar</x-secondary-button>
                <x-primary-button wire:click="store">Guardar</x-primary-button>
            </x-slot>
        </x-modal>
    @endif
</div>
