<div>
    <form wire:submit.prevent="store">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" wire:model="title">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <select name="category_id" class="form-control" wire:model="category_id">
                <option value="">-Silakan Pilih-</option>
                @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="d-grid">
            <button class="btn btn-primary">Save</button>
        </div>
    </form>
</div>
