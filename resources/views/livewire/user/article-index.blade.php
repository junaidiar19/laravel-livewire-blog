<div class="container">
    <div class="row">
        <div class="col-md-8">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="card">
                <div class="card-header bg-white py-3">
                    <h6 class="mb-0 fw-semibold">Your Article</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-auto mb-3 mb-md-0">
                            <select wire:model="row" class="form-control">
                                <option value="10">10</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <div class="col-md-4 ms-auto">
                            <input type="text" class="form-control" wire:model="search" placeholder="Searching...">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" style="white-space: nowrap; font-size: small;">
                            <thead>
                                <tr>
                                    <th width="10">#</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Publish</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($articles as $article)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $article->title }}</td>
                                        <td>{{ $article->category->name }}</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    wire:click="articlePublish({{ $article->id }}, {{ $article->is_published }})"
                                                    {{ $article->is_published ? 'checked' : '' }}>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('users.article.write', $article->id) }}"
                                                class="btn btn-primary btn-sm">
                                                <i class="bi-pencil me-1"></i> Write
                                            </a>
                                            <button wire:click="edit({{ $article->id }})"
                                                class="btn btn-success btn-sm">
                                                <i class="bi-pencil"></i>
                                            </button>
                                            <button class="btn btn-danger btn-sm"
                                                wire:click="$emit('article-delete', {{ $article->id }})">
                                                <i class="bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td align="center" colspan="5">-no data-</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-white py-3">
                    <h6 class="mb-0 fw-semibold">Add Article</h6>
                </div>
                <div class="card-body">
                    @if (@$isEdit)
                        <livewire:user.article-edit />
                    @else
                        <livewire:user.article-create />
                    @endif
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            Livewire.on('article-delete', function(id) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        @this.call('articleDelete', id);
                    }
                })
            });
        </script>
    @endpush
</div>
