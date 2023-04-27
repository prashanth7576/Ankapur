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

    </head>

    <body>

        <div>
            <div class="row">
                <div class="card col-md-6  "
                    style="box-shadow: 0px 10px 50px rgba(180, 174, 174, 0.7);margin-bottom:20px; height:auto">
                    <br>
                    <br>



                    @foreach ($user as $i)
                        @if ($i->created_at == Carbon\Carbon::now())
                            <div style="margin-left:20px;border:1px solid lightgray; border-radius:10px; padding:10px">
                                {{-- @foreach ($orders as $j)

<img src="{{ asset('public/products/' . $j->productimage) }}" width="100px" style="border-radius: 5px; height:100px">

    
@endforeach --}}
                                {{-- <div class="flex">
                                
                                <p style="margin-left: 30px">{{ $i->productname }}</p>
                                <p style="margin-left: 30px">{{ $i->productprice }}</p>
                                <p style="margin-left: 30px">{{ $i->quantity }}</p>
                            </div> --}}

                                <table class="table" style="border:white">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name </th>
                                            <th> Product Price </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td>{{ $i->productname }}</td>
                                            <td>{{ $i->productprice }}</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <br>
                        @endif
                    @endforeach





                </div>
                <br>

                <br>
                <div class="col-md-1"></div>


                <div class="card col-md-4 mx-auto"
                    style="box-shadow: 0px 10px 50px rgba(180, 174, 174, 0.7);padding-bottom:10px">


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

                        {{-- @foreach ($reports as $i)
                            <input type="text" name="customerid" id="customerid" value="{{ $data->customerid }}"
                                style="border:none; background:none;">

                            <input type="text" name="orderdate" id="orderdate" value="{{ $i->orderdate }}"
                                style="border:none; background:none;">

                            <input type="text" name="orderstatus" id="orderstatus" value="{{ $i->status }}"
                                style="border:none; background:none;">

                            <input type="text" name="restcode" id="restcode" value="HN"
                                style="border:none; background:none;">





                            <input type="text" name="transactionstatus" id="transactionstatus" value="COD"
                                style="border:none; background:none;">

                            <input type="text" name="orderid" id="orderid" value="{{ $i->orderid }}"
                                style="border:none; background:none;">

                            <br>







                            <input type="text" name="CGST" id="cgst" style="border:none; background:none;">

                            <input type="text" name="SGST" id="sgst" style="border:none; background:none;">

                            <input type="text" name="cashsale" id="cashsale" style="border:none; background:none;">
                        @endforeach

                        @foreach ($datareports as $k)
                            <input type="text" name="customeraddress" id="customeraddress"
                                value="{{ $k->address }}" style="border:none; background:none;">
                        @endforeach  --}}

                        <div class="flex">
                            <button class="btn btn-success" type="submit" > Place order </button>

                            <a href="" class="btn btn-warning" type="submit" style="margin-left: 15px">
                                Cancel
                                Order </a>

                                {{-- <button type="button"  id='tax'> get </button> --}}

                        </div>

                        {{-- @endif --}}


                    </form>
                </div>
            </div>
        </div>



        {{-- <div>
            @foreach ($sum as $a)
   
                
            <h1>{{$a->customerid}}</h1>
            <p>
                {{$a->mobile}}
            </p>
            <p>
                {{$a->productname}}
            </p>
w
      

           
                
            @endforeach
        </div> --}}

    </body>

    </html>

    
    <script>

        var btn = document.getElementById("tax");
        
        btn.addEventListener("click", charges);
        
        
             function charges(){
        var totalprice = document.getElementById('price').value;
        var servicetax = 2.5;
        var amount = Math.round(totalprice / 100 * servicetax);
        var cgstamount = document.getElementById('cgst').value = amount;
        var sgstamount = document.getElementById('sgst').value = amount;
        
        var totalamount = parseInt(totalprice) + parseInt(cgstamount) + parseInt(sgstamount);
        var cash = document.getElementById('cashsale').value = totalamount;
             }
        </script>



</x-app-layout>
