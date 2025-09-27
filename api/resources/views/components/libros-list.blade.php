<div class="libros-list row g-4">
        @foreach($booksData as $libro)
            <div class="col-md-6 col-lg-4 col-xl-3">
                <div clase="card book-card h-100">
                    @if ($libro->patrocinado)
                        <x-tarjeta-patrocinio :libro="$libro" />
                    @else
                        <x-tarjeta-perfil :libro="$libro" />
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</div>
