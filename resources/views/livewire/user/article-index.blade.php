<div class="container">
    <div class="row">
        <div class="col-md-8">
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
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="10">#</th>
                                    <th>Title</th>
                                    <th>Category</th>
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

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td align="center" colspan="4">-no data-</td>
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
                    @else
                        <livewire:user.article-create />
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
