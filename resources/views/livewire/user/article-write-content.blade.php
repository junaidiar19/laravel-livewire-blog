<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9">

                <div class="mb-3">
                    <a href="{{ route('users.article') }}" class="text-decoration-none"><i class="bi-arrow-left me-1"></i>
                        Kembali
                    </a>
                </div>
                <div class="card">
                    <div class="card-header py-3 bg-white">
                        <h6 class="mb-0">Write Article</h6>
                    </div>
                    <div class="card-body">
                        <p class="mb-0 text-muted">Title</p>
                        <p class="fw-semibold">{{ $article->title }}</p>

                        <form wire:submit.prevent="save">
                            <div class="mb-3" wire:ignore>
                                <label for="content" class="form-label">Content</label>
                                <textarea id="ck-content" class="form-control" wire:model="content"></textarea>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-primary">Save</button>
                            </div>
                            @if (session()->has('success'))
                                <div class="mt-3 text-success">
                                    <i class="bi-check-circle-fill"></i>
                                    {{ session('success') }}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @push('styles')
            <style>
                /* Mengatur height dari ckeditor */
                .ck-editor__editable[role="textbox"] {
                    min-height: 200px;
                }
            </style>
        @endpush
        @push('scripts')
            <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
            <script>
                // ketika halaman di load
                window.addEventListener('load', () => {

                    // jalankan emit loadEditor
                    Livewire.emit('loadEditor');
                })

                // trigger emit loadEditor
                Livewire.on('loadEditor', () => {

                    // load ck editor form
                    ClassicEditor.create(document.querySelector('#ck-content'))
                        .then(editor => {

                            // ketika mengisi form, set value dari variable content
                            editor.model.document.on('change:data', () => {
                                @this.set('content', editor.getData());
                            })
                        })
                        .catch(error => {
                            console.error(error);
                        });
                });
            </script>
        @endpush
    </div>

</div>
