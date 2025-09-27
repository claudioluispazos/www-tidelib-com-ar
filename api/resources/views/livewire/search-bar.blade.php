<div class="position-relative">
    <input type="text" class="form-control" placeholder="Buscar libros..." wire:model.live="query">
    @if ($showResults)
        <ul class="list-group position-absolute w-100 mt-1 shadow">
            @foreach ($results as $result)
                <li class="list-group-item">{{ $result }}</li>
            @endforeach
        </ul>
    @endif
</div>
