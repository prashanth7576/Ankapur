<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kitchen') }}
        </h2>
    </x-slot>
    <br><br>

    {{-- @foreach ($data as $i)

{{$i->totalprice}}
    
@endforeach --}}

    {{-- <div class="card">
        <div class="card-header">
            <p>Name:</p>
            <p>Mobile:</p>
            <p>Address: </p>
        </div>
        <div class="card-body"> --}}


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

        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <style>
            .card {
                width: 23rem;
                height: auto;
                border-radius: 15px;
                background-color: rgb(0, 155, 119, 0.2);
                margin-left: 20px;
                padding: 10px
            }

            p {

                text-transform: capitalize;
            }



            @media(max-width:960px) {
                .card {
                    width: 23rem;
                    height: auto;
                    border-radius: 15px;
                    background-color: rgb(225, 222, 222);
                    margin-left: 50px;
                    margin-bottom: 15px
                }

                p {

                    text-transform: capitalize;
                }



            }
        </style>
    </head>

    <body>





        <div class="container" style="  margin: auto; margin-top: 20px;">
            <div class="row">

                @foreach ($data as $i)
                    @if ($i->status == 'preparing')
                        <div class="card">

                            <div>
                                <p>Customer ID: <b>{{ $i->customerid }}</b></p>
                                <p>Name: <b> {{ $i->customername }} </b></p>
                                <p>Mobile: <b> {{ $i->mobile }} </b></p>
                                <p>Order ID: <b> {{ $i->orderid }} </b></p>
                                <p>Status: <b> {{$i->status}} </b></p>
                                {{--                         
                                <p>Order Date: {{$i->orderdate}}</p>
                                <p>Order Time: {{$i->ordertime}}</p> --}}

                            </div>
                            <hr>
                            <div class="card-body">





                                <table class="table" style="border:white">
                                    <thead>
                                        <tr>

                                            <th>Product Name </th>
                                            <th> Quantity </th>
                                            <th> Product Price </th>
                                            <th> Total price </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>

                                            <td>{{ $i->productname }}</td>
                                            <td>{{ $i->quantity }}</td>
                                            <td>{{ $i->productprice }}</td>
                                            <td>{{ $i->totalprice }}</td>

                                        </tr>
                                    </tbody>
                                </table>

                                <button class="btn btn-primary"> <a href="{{ url('status', $i->id) }}"> <span style="color: white"> Completed </span>
                            </div>

                        </div>
                    
                        
                    @endif
                @endforeach




            </div>
        </div>











    </body>

    </html>


    </div>


</x-app-layout>
