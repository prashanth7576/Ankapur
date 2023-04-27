{{-- @foreach ($data as $i)
            <p>{{$i->productname}}</p>
       <p>{{$i->status}}</p>

<button class="btn btn-primary"> <a href="{{ url('completed', $i->id) }}"> <span>Completed</span>
</a> </button>

@endforeach --}}

@foreach ($data as $i)

<input type="text" id="price" value="{{$i->totalprice}}" >

<input type="text" id="cgst" value="{{number_format($i->totalprice/100*2.5)}}">
<input type="text" id="sgst" value="{{number_format($i->totalprice/100*2.5)}}">
<input type="text" name="" id="cashsale" >
     
@endforeach


<button type="button"  id='tax'> get </button>

<script>
var totalprice = document.getElementById('price').value;
var cgstamount = document.getElementById('cgst').value ;
var sgstamount = document.getElementById('sgst').value ;


var result = Number(price.value) + Number(cgst.value) + Number(sgst.value);
 cashsale.innerHTML = result;

// var totalamount = parseInt(totalprice) + parseInt(cgstamount) + parseInt(sgstamount);
// var cash = document.getElementById('cashsale').value = totalamount;

// var btn = document.getElementById("tax");

// btn.addEventListener("click", charges);


//      function charges(){
// var totalprice = document.getElementById('price').value;
// var servicetax = 2.5;
// var amount = Math.round(totalprice / 100 * servicetax);
// var cgstamount = document.getElementById('cgst').value = amount;
// var sgstamount = document.getElementById('sgst').value = amount;

// var totalamount = parseInt(totalprice) + parseInt(cgstamount) + parseInt(sgstamount);
// var cash = document.getElementById('cashsale').value = totalamount;
//      }
</script>


@foreach ($data as $j)


@if ( $j->status == 'completed' && $j->orderdate == Carbon\Carbon::now()->format('Y-m-d') )
  
<p>{{$j->customername}}</p>
<h1>{{$j->productname}}</h1>
     
@endif


     

@endforeach
