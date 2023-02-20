<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
aria-labelledby="offcanvasNavbarLabel">
<div class="offcanvas-header">

    <button type="button" class="btn-close text-reset"
        data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>
<div class="offcanvas-body" style="margin-left:5%">
    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">



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

    <div class="form-group mb-3">
        <label for="image"> Image:</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" placeholder="Enter Last Name" wire:model="image">
        @error('image') <span class="text-danger">{{ $message }}</span>@enderror
    </div> 

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
        <button wire:click.prevent="store()" class="btn btn-success btn-block">Save</button>
    </div>
</form>

    </ul>
</div>
</div>