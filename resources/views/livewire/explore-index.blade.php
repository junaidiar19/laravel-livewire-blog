<div>
    <div class="container py-2">
        <ul class="nav nav-pills border-bottom mb-4">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">For You</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Data Science</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Technology</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Programming</a>
            </li>
        </ul>

        <div class="row">
            @foreach ($articles as $article)
                <div class="col-md-3 mb-4 d-flex align-self-stretch">
                    <a href="{{ route('articles.show', $article->slug) }}"
                        class="card text-decoration-none overflow-hidden border-0">
                        <img src="{{ $article->cover_url }}" class="img-fluid rounded mb-3" alt="">
                        <div class="d-flex flex-column relative h-100">
                            <p class="text-muted mb-2">{{ $article->created_at->format('d M Y') }}</p>
                            <h6 class="fw-semibold text-dark lh-base">{{ $article->title }}</h6>

                            <div class="mt-auto">
                                <p class="text-muted">{{ $article->category->name }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
