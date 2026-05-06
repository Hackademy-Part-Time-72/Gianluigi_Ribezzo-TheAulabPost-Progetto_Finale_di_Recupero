@props(['articles', 'status'])

<div class="table-responsive mb-4">
    <h5 class="fw-bold text-brand mb-3">
        @if($status === 'to_review') Articoli da Revisionare
        @elseif($status === 'accepted') Articoli Accettati
        @else Articoli Rifiutati
        @endif
    </h5>

    @if($articles->isEmpty())
        <p class="text-muted small">Nessun articolo in questa categoria.</p>
    @else
        {{-- Mobile: cards --}}
        <div class="d-md-none">
            @foreach($articles as $article)
            <div class="card mb-3 bg-body-secondary shadow-sm border-0">
                <div class="card-body">
                    <h6 class="fw-bold mb-1">{{ $article->title }}</h6>
                    <p class="text-muted small mb-2">
                        {{ $article->user->getFullName() }} &middot;
                        {{ $article->category->name ?? '—' }} &middot;
                        {{ $article->created_at->format('d/m/Y') }}
                    </p>
                    <div class="d-flex gap-2 flex-wrap">
                        @if($status === 'to_review')
                            <a href="{{ route('article.show', $article) }}" class="btn btn-outline-brand btn-sm">Leggi</a>
                            <form action="{{ route('revisor.accept', $article) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Accetta</button>
                            </form>
                            <form action="{{ route('revisor.reject', $article) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Rifiuta</button>
                            </form>
                        @else
                            <form action="{{ route('revisor.resetReview', $article) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-outline-secondary btn-sm">Rimanda in revisione</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- Desktop: tabella --}}
        <div class="d-none d-md-block table-responsive">
            <table class="table table-bordered table-hover align-middle bg-body-secondary shadow-sm rounded">
                <thead class="table-dark">
                    <tr>
                        <th>Titolo</th>
                        <th>Autore</th>
                        <th>Categoria</th>
                        <th>Data</th>
                        <th>Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->user->getFullName() }}</td>
                            <td>{{ $article->category->name ?? '—' }}</td>
                            <td>{{ $article->created_at->format('d/m/Y') }}</td>
                            <td class="d-flex gap-2 flex-wrap">
                                @if($status === 'to_review')
                                    <a href="{{ route('article.show', $article) }}" class="btn btn-outline-brand btn-sm">Leggi</a>
                                    <form action="{{ route('revisor.accept', $article) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Accetta</button>
                                    </form>
                                    <form action="{{ route('revisor.reject', $article) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm">Rifiuta</button>
                                    </form>
                                @else
                                    <form action="{{ route('revisor.resetReview', $article) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-secondary btn-sm">Rimanda in revisione</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
