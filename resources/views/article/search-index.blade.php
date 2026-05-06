<x-layout>
    <div class="container-fluid p-3 bg-body-secondary border-bottom shadow-sm">
        <div class="container text-center py-2">
            <h1 class="display-6 fw-bold text-brand m-0">Risultati per: "{{ $query }}"</h1>
            <p class="text-muted mt-1">{{ $articles->count() }} {{ $articles->count() === 1 ? 'articolo trovato' : 'articoli trovati' }}</p>
        </div>
    </div>

    <div class="container my-5">
        <div class="row g-4">
            @forelse($articles as $article)
            <div class="col-md-4">
                <div class="card h-100 card-editorial shadow-sm">
                    @if($article->image)
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top w-100" style="max-height: 220px; object-fit: cover;" alt="{{ $article->title }}">
                    @endif
                    <div class="card-body p-4 d-flex flex-column bg-body-secondary">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="{{ route('article.byCategory', ['category' => $article->category]) }}" class="badge bg-accent text-dark small fw-bold text-uppercase text-decoration-none">{{ $article->category->name }}</a>
                            <span class="text-muted small">{{ $article->created_at->format('d/m/Y') }}</span>
                        </div>
                        <h4 class="card-title fw-bold mb-3">{{ $article->title }}</h4>
                        <h6 class="card-subtitle mb-3 text-muted">{{ $article->subtitle }}</h6>
                        <p class="card-text opacity-75 mb-4">{{ Str::limit($article->body, 150) }}</p>
                        @if($article->tags->isNotEmpty())
                            <div class="mb-3">
                                @foreach($article->tags as $tag)
                                    <span class="badge bg-secondary me-1 small">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        @endif
                        <div class="d-flex align-items-center mt-auto justify-content-between">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person-circle fs-4 me-2 text-brand"></i>
                                <h6 class="mb-0 fw-bold small">
                                    <a href="{{ route('article.byUser', ['user' => $article->user, 'name' => $article->user->getSlug()]) }}" class="text-reset text-decoration-none">{{ $article->user->getFullName() }}</a>
                                </h6>
                            </div>
                            <a href="{{ route('article.show', $article) }}" class="btn btn-brand btn-sm">Leggi</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>

        @if($articles->isNotEmpty())
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="{{ route('article.index') }}" class="btn btn-outline-brand">Torna a tutti gli articoli</a>
            </div>
        </div>
        @endif
    </div>
</x-layout>
