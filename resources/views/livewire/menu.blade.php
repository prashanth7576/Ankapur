@livewire('layouts.app')
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
        /* body {
            width: 100%;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #efefef;
            line-height: 1.5;

        }

        .container {
            width: 1100px;
            max-width: 100%;
            margin: 0 auto;
        }

        .row {
            display: flex
        } */
        #read{
            width: 150px
        }
    </style>
</head>

<body>



    

        <div class="container" style="  margin: auto; margin-top: 20px;">
            <div class="row">

                @if (count($menu) > 0)
                    @foreach ($menu as $i)
                        <div class='col-md-3 col-lg-3' style="margin-bottom: 20px; display:flex;">


                            <div class="card"
                                style="width: 20rem; height:370px; border-radius:15px; background-color:rgb(225, 222, 222);">
                                
                                {{-- <img src="{{$i->image}}" alt="" style="height: 150px; width:150px"> --}}
                                <iframe src="{{$i->image}}" width="100%" height="200" style="border:1px solid black;border-top-left-radius:15px;border-top-right-radius:15px">
                                </iframe>
                                <div style="margin-left: 25px">
                                <p>{{ $i->productname }}</p>
                                <p> <b>${{ $i->productprice }}</b></p>
                                <p> {{ $i->description }} </p>
                                </div>
                                {{-- <a id="read" href="#" class="btn btn-success"> Read More </a> --}}
                                <div style="display: flex">
                                    <button class="btn btn-success" wire:click="handleLogout" style="margin-left: 25px"> Add to Cart</button>
                                    <button class="btn btn-success" wire:click="handleLogout" style="margin-left: 75px"> Buy Now </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif


                </div>
        </div>


    


</body>

</html>
