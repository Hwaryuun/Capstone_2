

<div @if (count($sumeru) != 0) class="savers" @else class="saversx" @endif >

    @if (count($sumeru) != 0)

    <div class="saver">

    @foreach ($urdir as $order)
    <div class="containerner">
        <ul class="paginationss"> 
            

            @if ($order->nemu == null && $order->qtt ==  null   )
            <li style="text-align: center;"> <B>OTHER TRANSACTIONS  </B>  </li>
            @endif
            <li> <B>ORDER NO : </B> {{$order->tracking_no}}</li>
          
            @if ($order->nemu && $order->qtt)
            <li> <B>PRODUCT : </B>  {{$order->nemu}}</li>
            <li> <B>QUANTITY : </B> {{$order->qtt}}</li>
            @endif
         
            <li> <B>DATE : </B>  {{$order->created_at->diffForHumans()}}</li>
            <li> <B>PAYMENT : </B> ₱ : {{number_format((float)$order->paid, 2, ".",",") }}</li>
            <li class="lastchilde"> <B>ACTIONS : </B>    <button  class="cos" onclick="deletehisto({{$order->id}})"><i class="fa-solid fa-trash"> </i>   DELETE </button>  </li>
            <form id ="delete-form-{{$order->id}}" action="{{Route('HistoDestroyer', $order->id)}}" method = "POST">
                @csrf
                @method('DELETE')
            </form>  
        </ul>
    </div>
    @endforeach   
   </div>

   <div class="pagi">{{$urdir->links('chai')}}</div>


   @else
   <div class="d1cccc">
        <img src="/images/Asset_img/nodata.svg" alt="">
        <H5>No Order / Transaction History Yet.</H5>
   </div> 
   @endif

</div>

