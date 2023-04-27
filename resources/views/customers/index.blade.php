<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Customers') }}
        </h2>
    </x-slot>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>

#customer{
                margin-left: 950px;
            }

@media (max-width:960px) {
#customer{
                margin-left: 310px;
            }
        }

@media (max-width:480px) {

    #search{
        margin-right: -300px;
    }

    #customer{
        margin-top: 50px;
        margin-left: 0;
    }
}
        </style>


    </head>

    <body>



        <div class="row">

            <div class="col-md-3"></div>
            <div class="col-md-6 mb-2">
                <div>
                    <div>
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

                        {{-- @if ($updateProduct)
                        @include('livewire.product.edit')
                        @else
                        @include('livewire.product.index') 
                    @endif  --}}
                    </div>
                </div>
            </div>

            <div>
                <br>
                <br>
                <br>

                <div class="navbar navbar-light" style="margin-top:-4%;">
                    <div class="container-fluid">

                        <div class="flex">

                            <form action="{{ url('customers') }}" method="GET">
                                <div class="form-group flex" id="search" style="margin-left: 45%">



                                    <input type="text"  name="search" placeholder="Enter Mobile Number"
                                        style="border-radius: 10px; height:38px; margin-top:-2%; margin-right:10%"
                                        value="">
                                  
                                    <button type="submit" class="btn btn-primary active"> Submit</button>
                                </div>

                            </form>

                            <button class="btn btn-primary " id="customer" type="button" data-bs-toggle="offcanvas"
                                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                                >
                                Add Customers
                            </button>

                        </div>


                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                            aria-labelledby="offcanvasNavbarLabel">
                            <div class="offcanvas-header">

                                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                    aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body" style="margin-left:5%">
                                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">



                                    <form action="{{ route('customers.store') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf

                                        <div class="form-group mb-3">
                                            <label for="firstname"> First Name:</label>
                                            <input type="text"
                                                class="form-control @error('firstname') is-invalid @enderror"
                                                id="firstname" placeholder="Enter First Name" name="firstname">
                                            @error('firstname')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="lastname"> Last Name:</label>
                                            <input type="text"
                                                class="form-control @error('lastname') is-invalid @enderror"
                                                id="lastname" placeholder="Enter Last Name" name="lastname">
                                            @error('lastname')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>



                                        <div class="form-group mb-3">
                                            <label for="mobile"> Mobile:</label>
                                            <input type="number"
                                                class="form-control @error('mobile') is-invalid @enderror"
                                                id="mobile" placeholder="Enter Mobile Number" name="mobile">
                                            @error('mobile')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group mb-3">
                                            <label for="address"> Address:</label>
                                            <textarea type="text" class="form-control @error('address') is-invalid @enderror" id="description"
                                                placeholder="Enter Address" name="address"> </textarea>
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="d-grid gap-2">
                                            <button type="submit" class="btn btn-success btn-block">Save</button>
                                        </div>
                                    </form>



                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-10 ">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            @if (count($customers) > 0)
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th> First Name</th>
                                            <th> Last Name </th>
                                            <th> Mobile </th>
                                            <th> Address </th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($customers as $customer)
                                            <tr>
                                                <td style="text-transform: capitalize">
                                                    {{ $customer->firstname }}
                                                </td>
                                                <td style="text-transform: capitalize">
                                                    {{ $customer->lastname }}
                                                </td>
                                                <td style="text-transform: capitalize">
                                                    {{ $customer->mobile }}
                                                </td>
                                                <td>
                                                    {{ $customer->address }}
                                                </td>
                                                


                                                <td>

                                                    <form action="{{ route('customers.destroy', $customer->id) }}"
                                                        method="POST">

                                                        {{-- <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a> --}}

                                                        <a 
                                                            href="{{ url('customers-edit', $customer->id) }}" style="text-decoration: none"> <i class="fa fa-pencil-square-o" style="font-size:24px; color:black"></i> </a>

                                                        @csrf
                                                        @method('DELETE')
{{-- 
                                                        <button type="submit" class="btn btn-danger">Delete</button> --}}
                                                        <a href="{{url('cart/'. $customer->id)}}" class="btn btn-success" style="margin-left: 20px"> Place Order </a> 
                                                    </form>

                                                   
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="3" align="center">
                                                No Items Found.
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>

    </html>

</x-app-layout>
