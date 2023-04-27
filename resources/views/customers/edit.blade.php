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


    </head>

    <body>



        <div class="row justify-content-center">
            <div class="col-md-4" style="box-shadow: 0px 10px 50px rgba(180, 174, 174, 0.7); margin-top:30px; padding:25px; border-radius:10px">





                <form action="{{ url('customers/'.$customer->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group mb-3">
                        <label for="firstname"> First Name:</label>
                        <input type="text" class="form-control @error('firstname') is-invalid @enderror"
                            id="firstname" placeholder="Enter First Name" name="firstname" value="{{$customer->firstname}}">
                        @error('firstname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="lastname"> Last Name:</label>
                        <input type="text" class="form-control @error('lastname') is-invalid @enderror"
                            id="lastname" placeholder="Enter Last Name" name="lastname" value="{{$customer->lastname}}">
                        @error('lastname')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>



                    <div class="form-group mb-3">
                        <label for="mobile"> Mobile:</label>
                        <input type="number" class="form-control @error('mobile') is-invalid @enderror" id="mobile"
                            placeholder="Enter Mobile Number" name="mobile" value="{{$customer->mobile}}">
                        @error('mobile')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="address"> Address:</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="description"
                            placeholder="Enter Address" name="address" value="{{$customer->address}}">
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success btn-block">Save</button>
                    </div>
                </form>
            </div>
            </div>

    </body>
    </html>
</x-app-layout>

