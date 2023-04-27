<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
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

<style>

@media (max-width:960px) {
    #product{
        margin-left: 600px;
    }
}

@media (max-width:480px) {

    #product{
        margin-left: 200px;
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
                    @endif --}}
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <br>

            <div class="navbar navbar-light" >
                <div class="container-fluid">
                    <button class="btn btn-primary " id="product" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        Add Products
                    </button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">

                            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body" style="margin-left:5%">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">



                                <form action='{{route('products.store')}}' method="POST"  enctype="multipart/form-data">
@csrf
                                    <div class="form-group mb-3">
                                        <label for="productname"> Product Name:</label>
                                        <input type="text"
                                            class="form-control @error('productname') is-invalid @enderror"
                                            id="productname" placeholder="Enter Product Name" name="productname">
                                        @error('productname')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="productprice"> Product Price:</label>
                                        <input type="text"
                                            class="form-control @error('productprice') is-invalid @enderror"
                                            id="productprice" placeholder="Enter Product Price"
                                            name="productprice">
                                        @error('productprice')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
        <label for="image"> Image:</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" placeholder="Enter Last Name" name="productimage">
        @error('image') <span class="text-danger">{{ $message }}</span>@enderror
    </div> 

                                    <div class="form-group mb-3">
                                        <label for="category"> Category:</label>
                                        <input type="text"
                                            class="form-control @error('category') is-invalid @enderror" id="category"
                                            placeholder="Enter Category Type" name="category">
                                        @error('category')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="description"> Description:</label>
                                        <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description"
                                            placeholder="Enter Description" name="description"> </textarea>
                                        @error('description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="d-grid gap-2">
                                        <button type="submit"
                                            class="btn btn-success btn-block">Save</button>
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
                        @if (count($product) > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> Product Name</th>
                                        <th> Product Price </th>
                                        <th> Product Image </th>
                                        <th> Category </th>
                                        <th> Description </th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($product as $rs)
                                        <tr>
                                            <td>
                                                {{ $rs->productname }}
                                            </td>
                                            <td style="text-transform: capitalize">
                                                {{ $rs->productprice }}
                                            </td>
                                            <td>{{$rs->productimage}}</td>
                                            <td style="text-transform: capitalize">
                                                {{ $rs->category }}
                                            </td>
                                            <td>
                                                {{ $rs->description }}
                                            </td>


                                            <td>

                                                
                                                <a 
                                                href="{{ url('products-edit', $rs->id) }}" style="text-decoration: none"> <i class="fa fa-pencil-square-o" style="font-size:24px; color:black"></i> </a>

                                                {{-- <button wire:click="edit({{ $rs->id }})"
                                                    class="btn btn-primary btn-sm">Edit</button>
                                                <button onclick="deleteProduct({{ $rs->id }})"
                                                    class="btn btn-danger btn-sm">Delete</button> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="3" align="center">
                                            No post Found.
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