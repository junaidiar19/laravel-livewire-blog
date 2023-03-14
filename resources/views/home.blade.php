@extends('layouts.app')
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-3">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Blog Veldeva</h1>
                <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator,
                    etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
                <p>
                    <a href="{{ route('articles.index') }}" class="btn btn-primary my-2 px-3">Explore</a>
                    <a href="{{ route('register') }}" class="btn btn-secondary my-2 px-3">Register</a>
                </p>
            </div>
        </div>
    </section>
@endsection
