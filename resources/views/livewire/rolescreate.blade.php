<div class="navbar navbar-light" style="margin-top:-4%;margin-left:85%;">
    <div class="container-fluid">

        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">

                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" style="margin-left:5%">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">


                    <form>

                        <div class="form-group mb-3">
                            <label for="role"> Role:</label>
                            <input type="text" class="form-control @error('role') is-invalid @enderror"
                                id="role" placeholder="Enter Role" wire:model="role">
                            @error('role')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="description"> Description:</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                                placeholder="Enter Description" wire:model="description"> </textarea>
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button wire:click.prevent="store()" class="btn btn-success btn-block">Save</button>
                        </div>
                    </form>



                </ul>
            </div>
        </div>

    </div>
</div>
