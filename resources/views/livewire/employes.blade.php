<div>
    <div class="row">
        <div class="col-md-3"></div>
    <div class="col-md-6 mb-2">
        <div>
            <div>
                @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
 
                @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('error') }}
                    </div>
                @endif
 
                @if($updateEmploye)
                    @include('livewire.employesupdate')
                @else 
                    @include('livewire.employescreate')
                @endif 
            </div>
        </div>
    </div>

    <div >
        <div class="navbar navbar-light" style="margin-top: 2%;margin-left:80%;">
            <div class="container-fluid">
                <button class="btn btn-primary " type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    Add Employee
                </button>
              
            </div>
        </div>
    </div>
    </div>
 <div class="row justify-content-center">
    <div class="col-md-10 ">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th> Role </th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($employe) > 0)
                                @foreach ($employe as $rs)
                                    <tr>
                                        <td>
                                            {{$rs->employeeid}}
                                        </td>
                                        <td style="text-transform: capitalize">
                                            {{$rs->firstname}}
                                        </td>
                                        <td style="text-transform: capitalize">
                                            {{$rs->lastname}}
                                        </td>
                                        <td>
                                            {{$rs->email}}
                                        </td>
                                        <td>
                                            {{$rs->mobile}}
                                        </td>
                                        <td>
                                            {{$rs->role}}
                                        </td>
                                        <td>
                                            {{$rs->address}}
                                        </td>
                                        <td>
                                            <button wire:click="edit({{$rs->id}})" class="btn btn-primary btn-sm">Edit</button>
                                            <button onclick="deleteEmploye({{$rs->id}})" class="btn btn-danger btn-sm">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" align="center">
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
        function deleteEmploye(id){
            if(confirm("Are you sure to delete this record?"))
                window.livewire.emit('deleteEmploye',id);
        }
    </script>
</div>