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
            .card {
                width: 20rem;
                height: auto;
                border-radius: 15px;
                background-color: rgb(225, 222, 222);

            }

            #quantity {
                width: 100px;
                height: 30px;
                margin-bottom: 10px;
                margin-left: 20px;
                border-radius: 10px
            }

            .btn {
                margin-left: 45px
            }

            @media(max-width:960px) {
                .card {
                    width: 15rem;
                    height: auto;
                    border-radius: 15px;
                    background-color: rgb(225, 222, 222);
                    margin-left: -50px;
                    display: flex;
                }

                #quantity {
                    width: 70px;
                    height: 30px;
                    margin-bottom: 10px;
                    margin-left: 20px;
                    border-radius: 10px
                }

                .btn {
                    margin-left: 25px
                }

            }


            .prod{
                max-width: 960px;
                margin: auto;
                padding-inline: 16px;
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            }

            .prod_item{
                display: flex;
                flex-direction: column;
                row-gap: 5px;
                text-align: center;
                color: #727586;
                background-color: #fff;
                padding: 25px 20px;
            }

            .prod_item:nth-child(2){

                border-right: 1px solid rgba(114, 117, 134, .25);
                border-left: 1px solid rgba(114, 117, 134, .25);
            }


            @media screen and (max-width: 53.5em){
                .prod_item:nth-child(1){
                    border-bottom: 1px solid rgba(114, 117, 134, .25);
                }

                .prod_item:nth-child(2){
                    border-bottom: 1px solid rgba(114, 117, 134, .25);
                }
            }

            @media screen and (max-width: 36.5em){
            
               
                .prod_item:nth-child(2){
                    border: none;
                    border-top: 1px solid rgba(114, 117, 134, .25);
                    border-bottom: 1px solid rgba(114, 117, 134, .25);
                }
            }
        </style>
    </head>

    <body>





        <div class="container" style="  margin: auto; margin-top: 20px;">
            <div class="row">

                {{-- @include('order') --}}

                @if (count($product) > 0)
                    @foreach ($product as $i)
                        <div>


                            <div class="card">


                                <img src="{{ asset('public/products/' . $i->productimage) }}" width="400px"
                                    height="50px" style="border-top-left-radius:15px;border-top-right-radius:15px">

                                <div style="margin-left: 25px">
                                    <p>{{ $i->productname }}</p>
                                    <p> <b><i class="fa fa-rupee"></i>{{ $i->productprice }}</b></p>
                                    {{-- <p> {{ $i->description }} </p> --}}
                                </div>
                                {{-- <a id="read" href="#" class="btn btn-success"> Read More </a> --}}
                                <div style="display: flex">
                                    <form action="{{ route('menus.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf

                                        {{-- <input type="text" name="customername" value="{{$data->firstname}}"> --}}
                                        <input type="hidden" value="{{ $i->productname }}" name="productname">
                                        <input type="hidden" value="{{ $i->productprice }}" name="productprice">
                                        <input type="number" id="quantity" value="1" name="quantity">
                                        {{-- <input type="hidden" value="{{$i->productimage}}" name="productimage"> --}}
                                        <input type="hidden" value="{{ $i->category }}" name="category">
                                        <input type="hidden" value="{{ $i->description }}" name="description">

                                        <button type="submit" class="btn btn-success"> Add to Cart</button>




                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif


            </div>
        </div>



         @if (count($product) > 0)
                    @foreach ($product as $i)
                        <div>


                            <div class="prod">
                                <div class="prod_item">


                                <img class="prod_image" src="{{ asset('public/products/' . $i->productimage) }}" width="400px"
                                    height="50px" style="border-top-left-radius:15px;border-top-right-radius:15px">

                                <div class="prod_plan">
                                    <p class="prod_plan-name">{{ $i->productname }}</p>
                                    <p class="prod_plan-price"> <b><i class="fa fa-rupee"></i>{{ $i->productprice }}</b></p>

                                </div>

                                {{-- <div style="display: flex">
                                    <form action="{{ route('menus.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf


                                        <input type="hidden" value="{{ $i->productname }}" name="productname">
                                        <input type="hidden" value="{{ $i->productprice }}" name="productprice">
                                        <input type="number" id="quantity" value="1" name="quantity">

                                        <input type="hidden" value="{{ $i->category }}" name="category">
                                        <input type="hidden" value="{{ $i->description }}" name="description">

                                        <button type="submit" class="btn btn-success"> Add to Cart</button>




                                    </form>
                                </div> --}}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif




        {{-- <h1>{{$customer->mobile}}</h1> --}}

<h1>weuifkhaweiudhweiudh</h1>

    </body>

    </html>

</x-app-layout>
