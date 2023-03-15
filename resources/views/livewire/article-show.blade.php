<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="text-center mb-4">
                    <p class="text-muted">{{ $article->created_at->format('d M Y') }}</p>
                    <h4 class="lh-base mb-4">
                        {{ $article->title }}
                    </h4>

                    <p>{{ $article->user->name }}</p>
                </div>

                <img src="{{ $article->cover_url }}" class="img-fluid rounded mb-3" alt="">

                {!! $article->content !!}
            </div>
        </div>
    </div>
</div>
