

<form>
   
    
    <div class="form-group mb-3">
        <label for="productname"> Product Name:</label>
        <input type="text" class="form-control @error('productname') is-invalid @enderror" id="productname" placeholder="Enter Product Name" wire:model="productname">
        @error('productname') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group mb-3">
        <label for="productprice"> Product Price:</label>
        <input type="text" class="form-control @error('productprice') is-invalid @enderror" id="productprice" placeholder="Enter Product Price" wire:model="productprice">
        @error('productprice') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    {{-- <div class="form-group mb-3">
        <label for="image"> Image:</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" placeholder="Enter Last Name" wire:model="image">
        @error('image') <span class="text-danger">{{ $message }}</span>@enderror
    </div> --}}

    <div class="form-group mb-3">
        <label for="category"> Category:</label>
        <input type="text" class="form-control @error('category') is-invalid @enderror" id="category" placeholder="Enter Category Type" wire:model="category">
        @error('category') <span class="text-danger">{{ $message }}</span>@enderror
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