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
        <label for="employeeid">Employe ID:</label>
        <input type="text" class="form-control @error('employeeid') is-invalid @enderror" id="employeeid" placeholder="Enter Employe ID" wire:model="employeeid">
        @error('employeeid') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group mb-3">
        <label for="firstname">First Name:</label>
        <input type="text" class="form-control @error('firstname') is-invalid @enderror" id="firstname" placeholder="Enter First Name" wire:model="firstname">
        @error('firstname') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group mb-3">
        <label for="lastname">Last Name:</label>
        <input type="text" class="form-control @error('lastname') is-invalid @enderror" id="lastname" placeholder="Enter Last Name" wire:model="lastname">
        @error('lastname') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group mb-3">
        <label for="mobile">Mobile:</label>
        <input type="number" class="form-control @error('mobile') is-invalid @enderror" id="mobile" placeholder="Enter Mobile Number" wire:model="mobile">
        @error('mobile') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group mb-3">
        <label for="email">Email:</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email" wire:model="email">
        @error('email') <span class="text-danger">{{ $message }}</span>@enderror
    </div>

    <div class="form-group mb-3">
        <label for="role"> Role:</label>

        <select  class="form-control @error('role') is-invalid @enderror" id="role" placeholder="Enter Role" wire:model="role">

            <option selected value=""> Choose Role </option>
            @if (count($roles) > 0)
            @foreach ($roles as $rs)
           
            <option value="{{$rs->role}}">{{$rs->role}}</option>
            @endforeach
            @endif
            
          </select>
        @error('role') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    

    <div class="form-group mb-3">
        <label for="address">Address:</label>
        <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="Enter Address" wire:model="address">
        @error('address') <span class="text-danger">{{ $message }}</span>@enderror
    </div>
    
    <div class="d-grid gap-2">
        <button wire:click.prevent="store()" class="btn btn-success btn-block">Save</button>
    </div>
</form>

    </ul>
</div>
</div>