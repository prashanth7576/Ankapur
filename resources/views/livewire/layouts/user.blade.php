<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>


    <style>
/* 
.navbar-nav > li {
  float: left;
  position: relative;
}
    nav .navbar-nav .active::after {
  border-bottom: 5px solid #5bc0eb;
  bottom: -10px;
  content: " ";
  left: 0;
  position: absolute;
  right: 0;
} */





nav .navbar-nav li:hover,
nav .navbar-nav li.current-menu-item {
    border-bottom: 3px solid red;
}


    </style>
</head>
<body>
    

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <h1 class="navbar-brand " style="margin-left: 2%"> Ankapur Chicken </h1>

    {{-- <ul class="navbar-nav">
        <li class="nav-item active">
            <a href="/employes" class="nav-link"> Employes </a>
        </li>

        <li class="nav-item">
            <a href="/roles" class="nav-link"> Roles </a>
        </li>

        <li class="nav-item">
            <a href="/products" class="nav-link"> Products </a>
        </li>
    </ul> --}}

    <ul class="navbar-nav  " style="margin-left: auto; margin-right:2%">
       
        <li class="nav-item">
            <a href="/profile" class="nav-link"> {{auth()->user()->name}} </a>
        </li>

        
        

        <li class="nav-item">
            <a href="" class="nav-link"> Logout </a>
        </li>
    </ul>



</nav>

</body>
</html>
