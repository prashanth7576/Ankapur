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

#basket{
            width:150px;
            margin-left: auto;
            margin-bottom: 10px;
            
        }

@media(max-width:960px){
        #basket{
            width:150px;
            margin-left: 450px;
            margin-bottom: 10px;
            
        }
    }

    @media(max-width:480px){
        #basket{
            width:150px;
            margin-left: 200px;
            margin-bottom: 10px;
            
        }
    }
  </style>
    </head>

    <body>

        <div class="container" >
            <div class="row">

                @if (count($product) > 0)
                    @foreach ($product as $i)
                        <div class='col-md-3 col-lg-3' style="margin-bottom: 20px; display:flex;">


                            <div class="card"
                                style="width: 20rem; height:auto; border-radius:15px; background-color:rgb(225, 222, 222); padding-bottom:15px">


                                <img src="{{ asset('public/products/' . $i->productimage) }}" width="400px"
                                    height="50px" style="border-top-left-radius:15px;border-top-right-radius:15px">

                                <div style="margin-left: 25px">
                                    <p>{{ $i->productname }}</p>
                                    <p> <b><i class="fa fa-rupee"></i>{{ $i->productprice }}</b></p>

                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif

            </div>
        </div>

    </body> 

    </html>

</x-app-layout>
