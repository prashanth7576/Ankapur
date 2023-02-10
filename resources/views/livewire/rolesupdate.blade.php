<form>
   
    {{-- <input type="hidden" wire:model="id"> --}}
    <div class="form-group mb-3">
        <label for="role"> Role:</label>
        <input type="text" class="form-control @error('role') is-invalid @enderror" id="role" placeholder="Enter Role" wire:model="role">
        @error('role') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group mb-3">
        <label for="description"> Description:</label>
        <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Enter Description" wire:model="description" > </textarea>
        @error('description') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    
    <div class="d-grid gap-2">
        <button wire:click.prevent="update()" class="btn btn-success btn-block">Save</button>
        <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>
    </div>
</form>