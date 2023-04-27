@foreach ($datas as $i)
            
       

<button class="btn btn-primary"> <a href="{{ url('completed', $i->id) }}"> <span>Reject</span>
</a> </button>

@endforeach