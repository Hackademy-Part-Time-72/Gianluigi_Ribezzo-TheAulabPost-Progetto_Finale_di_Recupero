@props(['items', 'type'])

@php
    $label = $type === 'tag' ? 'Tag' : 'Categoria';
    $labelPlural = $type === 'tag' ? 'Tag' : 'Categorie';
    $storeRoute = $type === 'tag' ? 'admin.storeTag' : null;
    $destroyRoute = $type === 'tag' ? 'admin.destroyTag' : 'admin.destroyCategory';
@endphp

<div class="mb-5">
    <h5 class="fw-bold text-brand mb-3">{{ $labelPlural }}</h5>

    @if($type === 'tag')
        <form action="{{ route('admin.storeTag') }}" method="POST" class="d-flex flex-column flex-sm-row gap-2 mb-3">
            @csrf
            <input type="text" name="name" class="form-control form-control-sm" placeholder="Nuovo tag..." required>
            <button type="submit" class="btn btn-brand btn-sm text-nowrap">Aggiungi</button>
        </form>
    @endif

    @if($items->isEmpty())
        <p class="text-muted small">Nessun elemento presente.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle bg-body-secondary shadow-sm rounded">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        @if($type === 'tag')<th>Slug</th>@endif
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            @if($type === 'tag')<td class="text-muted small">{{ $item->slug }}</td>@endif
                            <td>
                                <form action="{{ route($destroyRoute, $item) }}" method="POST"
                                      onsubmit="return confirm('Eliminare {{ $label }}: {{ $item->name }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
