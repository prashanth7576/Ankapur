<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Orders') }}
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
        </div>
        <div class="table-responsive">
        
        <table class="table">

            <thead>
                <tr>
                    <th> Order Id</th>
                    <th> Customer Id </th>
                    <th> Customer Name </th>
                    <th> Mobile </th>
                    <th> Items </th>
                    <th> Quantity </th>
                     <th> Product Price </th>
                     <th> Total price </th>
                     <th> Order Time </th>
                     <th> Order Date </th>
                     <th> Status </th>
                     {{-- <th> Action </th> --}}

                </tr>
            </thead>

            @foreach ($data as $i) 

            <tr>
                <td>{{$i->orderid}}</td>
                <td>{{$i->customerid}}</td>
                <td>{{$i->customername}}</td>
                <td>{{$i->mobile}}</td>
                <td>{{$i->productname}}</td>
                <td>{{$i->quantity}}</td>
                <td>{{$i->productprice}}</td>
                <td>{{$i->totalprice}}</td>
                <td>{{$i->ordertime}}</td>
                <td>{{$i->orderdate}}</td>
                <td>{{$i->status}}</td>
                {{-- <td> <button class="btn btn-primary"> <a href="{{ url('status', $i->id) }}"> <span style="color: white">Change Status</span>
                </a> </button> </td> --}}
            </tr>
                
            @endforeach

            

        </table>
        </div>
    </body>
    </html>

</x-app-layout>