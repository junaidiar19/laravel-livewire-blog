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
            @for ($i = 1; $i <= 12; $i++)
                <div class="col-md-3 mb-4 d-flex align-self-stretch">
                    <a href="{{ route('articles.show', 'slug') }}"
                        class="card text-decoration-none overflow-hidden border-0">
                        <div class="d-flex flex-column relative h-100">
                            <img src="{{ asset('img/thumbnail.jpg') }}" class="img-fluid rounded mb-3" alt="">
                            <p class="text-muted mb-2">{{ now()->format('d M Y') }}</p>
                            <h6 class="fw-semibold text-dark lh-base">Lorem ipsum dolor sit amet consectetur,
                                adipisicing
                                elit.
                            </h6>
                        </div>
                    </a>
                </div>
            @endfor
        </div>
    </div>
</div>
