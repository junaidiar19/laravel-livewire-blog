<div>
    <div class="container py-2">
        <ul class="nav nav-pills border-bottom mb-4">
            <li class="nav-item">
                <a class="nav-link {{ !$category ? 'active' : '' }}" wire:click="handleCategory" aria-current="page"
                    href="#">For You</a>
            </li>
            @foreach ($categories as $item)
                <li class="nav-item">
                    <a class="nav-link {{ $category == $item->slug ? 'active' : '' }}" href="#"
                        wire:click="handleCategory('{{ $item->slug }}')">{{ $item->name }}</a>
                </li>
            @endforeach
        </ul>
        <div class="row" wire:loading.flex>
            @for ($i = 1; $i <= 12; $i++)
                <div class="col-md-3 mb-4">
                    <div class="bg-white rounded-3 overflow-hidden">
                        <div class="skeleton-box w-100" style="height: 170px;"></div>
                        <diV class="p-3 rounded-bottom">
                            <div class="skeleton-box w-25" style="height: 7px; border-radius: 5px;"></div>
                            <div class="skeleton-box w-100" style="height: 7px; border-radius: 5px;"></div>
                            <div class="skeleton-box w-75 mb-2" style="height: 7px; border-radius: 5px;"></div>
                            <div class="skeleton-box w-25" style="height: 7px; border-radius: 5px;"></div>
                        </diV>
                    </div>
                </div>
            @endfor
        </div>
        <div class="row" wire:loading.remove>
            @forelse ($articles as $article)
                <div class="col-md-3 mb-4 d-flex align-self-stretch">
                    <a href="{{ route('articles.show', $article->slug) }}" class="card text-decoration-none border-0">
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
            @empty
                <div class="col-md-12">
                    <div class="text-center py-5">
                        <p>-article not found-</p>
                    </div>
                </div>
            @endforelse
        </div>

        @if ($articles->count() > 0)
            <div class="d-flex justify-content-center py-4 pagination-section">
                {{ $articles->links() }}
            </div>
        @endif
    </div>

    @push('scripts')
        <script>
            document.querySelector('.pagination-section').addEventListener('click', function() {
                console.log('first')
                window.scrollTo(0, 0);
            });
        </script>
    @endpush
</div>
