<div>



    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 mb-2">
            <div class="">
                <div class="">
                    @if (session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('success') }}
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session()->get('error') }}
                        </div>
                    @endif

                </div>
            </div>

            @if ($updateRole)
                @include('livewire.rolesupdate')
            @else
                @include('livewire.rolescreate')
            @endif

        </div>
    </div>

    <div class="navbar navbar-light" style="margin-top:-4%;margin-left:85%;">
        <div class="container-fluid">
            <button class="btn btn-primary " type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar">
                Add Roles
            </button>

        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> Role </th>
                                    <th> Description </th>
                                    <th> Action </th>
                                </tr>
                            </thead>
                            <tbody>

                                @if (count($roles) > 0)
                                    @foreach ($roles as $rs)
                                        <tr>
                                            <td style="text-transform: capitalize">
                                                {{ $rs->role }}
                                            </td>
                                            <td style="text-transform: capitalize">
                                                {{ $rs->description }}
                                            </td>

                                            <td>
                                                <button wire:click="edit({{ $rs->id }})"
                                                    class="btn btn-primary btn-sm">Edit</button>
                                                <button onclick="deleteRole({{ $rs->id }})"
                                                    class="btn btn-danger btn-sm">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="3">
                                            No post Found.
                                        </td>
                                    </tr>
                                @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <script>
        function deleteRole(id) {
            if (confirm("Are you sure to delete this record?"))
                window.livewire.emit('deleteRole', id);
        }
    </script>
</div>
