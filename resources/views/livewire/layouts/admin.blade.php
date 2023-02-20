<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

   

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

    <ul class="navbar-nav">
        <li class="nav-item active">
            <a href="/employes" class="nav-link"> Employes </a>
        </li>

        <li class="nav-item">
            <a href="/roles" class="nav-link"> Roles </a>
        </li>

        <li class="nav-item">
            <a href="/products" class="nav-link"> Products </a>
        </li>

        <li class="nav-item">
            <a href="/menu" class="nav-link"> Menu </a>
        </li>

    </ul>

    <ul class="navbar-nav  " style="margin-left: auto; margin-right:2%">
       
        <li class="nav-item">
            <a href="/profile" class="nav-link"> {{auth()->user()->name}} </a>
        </li>

        
        
{{-- 
        <li class="nav-item">
            <form >
                <a class="nav-link" wire:click.prevent="destroy()"> Logout </a>
            </form>
            
        </li> --}}

        @auth

        @livewire('logout')
            
        @endauth

        
    </ul>



</nav>

</body>
</html>
