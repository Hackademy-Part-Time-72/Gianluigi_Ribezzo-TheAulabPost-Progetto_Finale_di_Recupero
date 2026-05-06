<x-layout>
    <div class="container-fluid p-3 bg-body-secondary border-bottom shadow-sm">
        <div class="container text-center py-5">
            <h1 class="display-4 fw-bold text-brand">{{ $article->title }}</h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                @if($article->image)
                    <img src="{{ Storage::url($article->image) }}" class="img-fluid rounded shadow-sm mb-4 w-100" alt="{{ $article->title }}">
                @endif
                
                <div class="d-flex flex-column flex-md-row justify-content-md-between align-items-md-center gap-2 mb-4">
                    <div>
                        <a href="{{ route('article.byCategory', ['category' => $article->category]) }}" class="badge bg-accent text-dark small fw-bold text-uppercase text-decoration-none">{{ $article->category->name }}</a>
                        <span class="text-muted ms-2">Pubblicato il {{ $article->created_at->format('d/m/Y') }}</span>
                        <span class="text-muted ms-2"><i class="bi bi-clock me-1"></i>{{ $article->readingTime() }} min di lettura</span>
                    </div>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-person-circle fs-4 me-2 text-brand"></i>
                        <h6 class="mb-0 fw-bold">
                            <a href="{{ route('article.byUser', ['user' => $article->user, 'name' => $article->user->getSlug()]) }}" class="text-reset text-decoration-none">{{ $article->user->getFullName() }}</a>
                        </h6>
                    </div>
                </div>

                <h4 class="text-muted mb-4">{{ $article->subtitle }}</h4>

                @if($article->tags->isNotEmpty())
                    <div class="mb-4">
                        @foreach($article->tags as $tag)
                            <span class="badge bg-secondary me-1">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                @endif

                <div class="article-body fs-5 opacity-75">
                    {{ $article->body }}
                </div>
                
                <div class="mt-5 pt-5 border-top">
                    <a href="{{ route('article.index') }}" class="btn btn-outline-brand">Torna all'ingresso</a>
                </div>
            </div>
        </div>
    </div>
</x-layout>