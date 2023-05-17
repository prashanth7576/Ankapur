<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menu') }}
        </h2>
    </x-slot>
    <br><br>

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
                #order{
                    margin-top: 10px;
                width: 150px
                }
            </style>
    </head>

    <body>

        <div>
            <div class="row">
                <div class="card col-md-6  "
                    style="box-shadow: 0px 10px 50px rgba(180, 174, 174, 0.7);margin-bottom:20px; height:auto">
                   

                    <p style="font-size: 20px; color:rgb(100, 96, 96); margin-top:10px;text-decoration:underline; margin-left:30px">
                        Cart Details </p>

                    <div style="margin-left:20px;border:1px solid lightgray; border-radius:10px; padding:10px">


                        <table class="table" style="border:white">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name </th>
                                    <th> Quantity </th>
                                    <th> Product Price </th>
                                    <th> Total price </th>
                                    <th> Action </th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($user as $i)
                                    <tr>
                                        <td>
                                            @foreach ($order as $j)
                                                <img src="{{ asset('public/products/' . $j->productimage) }}"
                                                    width="100px" style="border-radius: 5px; height:100px">
                                            @endforeach
                                        </td>
                                      



                                        <td>{{ $i->productname }}</td>
                                        {{-- <td>{{ $i->quantity }}</td> --}}
                                        <td> <input data-id="{{ $i->id }}" class="quantities" type="number" value="{{ $i->quantity }}" style="border: none;width:70px"></td>
                                        <td>{{ $i->productprice }}</td>
                                        <td>{{ $i->price }}</td>
                                        <td>

                                        <form action="{{ url('order', $i->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <div class="btn btn-danger">
                                                <input type="submit" class="button" value="Remove">
                                            </div>
                                        </form>
                                        </td>


                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <br>

                </div>
                <br>

                <br>
                <div class="col-md-1"></div>


                <div class="card col-md-4 mx-auto"
                    style="box-shadow: 0px 10px 50px rgba(180, 174, 174, 0.7);padding-bottom:10px; height:320px">


                    <form action="{{ url('cart') }}" method="post" style="align-items: center; margin-left:20px">
                        @csrf
                        <p style="font-size: 20px; color:rgb(100, 96, 96); margin-top:10px;text-decoration:underline">
                            Order Details </p>



                        @foreach ($user as $j)
                            <input type="hidden" name="productid[]" id="productid" value="{{ $j->productid }}"
                                style="border:none; background:none;">

                            <input type="hidden" name="customerid" id="customerid" value="{{ $j->customerid }}"
                                style="border:none; background:none;">

                            <input type="hidden" name="productname[]" id="productname" value="{{ $j->productname }}"
                                style="border:none; background:none;">


                            <input type="hidden" name="itemquantity[]" id="quantity" value="{{ $j->quantity }}"
                                style="border:none; background:none;">

                            <input type="hidden" name="mobilenumber[]" value="{{ $data->mobile }}"
                                style="border:none; background:none;">

                            <input type="hidden" name="name[]" value="{{ $data->firstname }}"
                                style="border:none; background:none;">

                            <input type="hidden" name="productprice[]" value="{{ $j->productprice }}"
                                style="border:none; background:none;">
                            <input type="hidden" name="totalprice[]" value="{{ $j->price }}"
                                style="border:none; background:none;">
                        @endforeach

                        <label for=""> Mobile Number:</label>

                        <input type="text" name="mobile" value="{{ $data->mobile }}"
                            style="border:none; background:none;">
                        <br>

                        <label for=""> Customer Name:</label>
                        <input type="text" name="customername" value="{{ $data->firstname }}"
                            style="border:none; background:none;">

                        <br>
                        <label for=""> Total Products:</label>
                        <input type="text" name="itemcount" id="totalproducts" value="{{ $list }}"
                            style="border:none; background:none;">
                        <br>

                        <label for=""> Total Price:</label>
                        <input type="text" name="price" id="price" value="{{ $report }}"
                            style="border:none; background:none;">
                        <br>

                        <label for=""> Delivery Charge:</label>
                        <input type="text" name="deliverycharge" id="deliverycharge" value="{{ $report }}"
                            style="border:none; background:none;">
                        <br>

                        

                        <div class="flex">
                            <button class="btn btn-success" id="order" type="submit"> Place order </button>

                            {{-- <a href="" class="btn btn-warning" type="submit" style="margin-left: 15px">
                                Cancel
                                Order </a> --}}



                        </div>

                    </form>
                </div>
            </div>
        </div>   

    </body>

    </html>

    <script>
        $(function() {
        $('.quantities').change(function() {
            var quantity = $(this).val();
            var cart_id = $(this).data('id');
            $.ajax({

                type: "POST",
                dataType: "json",
                url: '/quantity/update',
                data: {
                    'quantity': quantity,
                    'cart_id': cart_id
                },
                success: function(data) {
                    console.log(data.success)
                }
            });
        })
    });
    </script>


</x-app-layout>
