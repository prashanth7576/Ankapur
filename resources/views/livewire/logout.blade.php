{{-- <button class="nav-link btn rounded-0 btn-success text-white" wire:click="handleLogout">Logout</button> --}}

<li class="nav-item">
    <form >
        <a class="nav-link" wire:click.prevent="destroy()"> Logout </a>
    </form>
    
</li>