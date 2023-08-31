
<div>

<div  @if (count($sumeru) != 0) class="c111" @else  class="c11" @endif >
        
    @if(count($sumeru) != 0)
        
    <div class="sheishis">

        <div class="seisis">
        <div class="saikas">
            <H5> Order Status :</H5>
            <span class="tilesi">
                <input type="radio" id="sport1" name="radio"  wire:model = "status" value="0"> 
                <label class="forx2" for="sport1"> Show All </label>
            </span>    
            
          
            <span class="tilesi">
                <input type="radio" id="sport2" name="radio"  wire:model = "status" value="1"> 
                <label class="forx2" for="sport2"> New-Order </label>
            </span>  
            
            <span class="tilesi">
                <input type="radio" id="sport3" name="radio" wire:model = "status" value="2"> 
                <label class="forx2" for="sport3"> In-Progress  </label>
            </span>   

            <span class="tilesi">
                <input type="radio" id="sport4" name="radio" wire:model = "status" value="3"> 
                <label class="forx2" for="sport4"> Finished </label>
            </span>   
        </div>        
        </div>


        <div class="d2c">

            <div class="dcontentcx">
                         
                <div class="destination-contentyz">
                                        
                @foreach($partialtsz as $carts)
                    <div @if ($chx == $carts->id) class="dualsx2" @else class="dualsx"  @endif>
                      
                        <div class="col-contentxzy" >
                            <img src="/images/Product_img/{{$carts->Products->image}}">               
                        </div>
                        <div class="col-contentxzy">  
                                    
                        @if ($chx == $carts->id)
                            <div class="slasher">                    
                                <h5 class="h55"> 
                                    @if ($carts->Orders->paymentmode == 'Partial-Payment')
                                             <i class="fa-solid fa-circle" style="color: red;"></i> 
                                    @elseif($carts->Orders->paymentmode == 'Fully-Paid')
                                            <i class="fa-solid fa-circle" style="color: rgb(0, 94, 255);"></i> 
                                    @else
                                            <i class="fa-solid fa-circle"></i> 
                                    @endif {{$carts->Products->name}} </h5>
                                <hr>
                                <p class="ppp"> <b>Size : </b> {{ $carts->size}}</p>
                                <p class="ppp"> <b>Stock : </b> {{$carts->paperdefault}}</p>
                                @if ($carts->cover != null)
                                <p class="ppp">  <b>Cover : </b> {{$carts->cover}} </p>
                                <p class="ppp">  <b>Page : </b>  {{$carts->page}}</p>
                                @endif
                                <p class="ppp"> <b>Quantity : </b> {{$carts->quantity}}.pcs </p>
                                <p class="ppps">  <b>Price : </b> ₱.{{number_format((float)$carts->price, 2, ".",",") }}</p>
                                <p class="ppps">  <b>My Design : </b><a onclick="showie('{{$carts->files}}')"> Here </a></p> 
         
                            </div> 
                          @else
                                <h5 class="h55">{{$carts->Products->name}} </h5>  
                                <hr>
                                <div class="contaminated">
                                
                                    @if ($carts->status == 'New-Order')
                                    <i class="fa-solid fa-file-circle-exclamation"     style="color: rgb(0, 94, 255);" ></i>
                                    @elseif($carts->status == 'In-Progress')
                                    <i class="fa-solid fa-file-circle-minus" style="color: rgb(231, 196, 0);" ></i>  
                                    @else
                                    <i class="fa-solid fa-file-circle-check" style="color: rgb(0, 254, 51);"></i>
                                    @endif {{$carts->status}}
                                </div>   

                                <div class="contaminated">
                                    
                                    @if ($carts->Orders->paymentmode == 'Partial-Payment')
                                         <i class="fa-solid fa-circle" style="color: red;"></i> 
                                    @elseif($carts->Orders->paymentmode == 'Fully-Paid')
                                         <i class="fa-solid fa-circle" style="color: rgb(0, 94, 255);"></i> 
                                    @else
                                         <i class="fa-solid fa-circle"></i> 
                                    @endif {{$carts->Orders->paymentmode}}
                                </div>
                        
                                <div class="contaminated">{{$carts->Orders->tracking_no}}</div>   

                                {{-- <div class="contaminateds">{{$carts->Orders->tracking_no}}</div>     --}}
                            @endif
                           
                            <button  class="sin" title="Hide Orders" onclick="deleteorder({{$carts->id}})"><i class="fa-solid fa-trash"></i></button>           
                            <span class="tilexxyz" title="View">             
                                <input type="checkbox" id="sport1e{{$carts->id}}" value="{{$carts->id}}"  @if($chx == $carts->id) @checked(true) wire:click="CSXG" @else wire:click="CSX({{$carts->id }})"  @endif  >  
                                {{-- <label class="forx2" for="sport1e{{$carts->id}}"></label> --}}
                            </span>
                            <form id ="delete-form-{{$carts->id}}" action="{{Route('Payd.destroy', $carts->id)}}" method = "POST">
                                @csrf
                                @method('DELETE')
                            </form>   
                        
                        </div>
        
                    </div>
                    @endforeach
                </div>
               <div class="pagi">{{$partialtsz->links('chai')}}</div>
            </div>    
        </div>

    </div>




    @else
        <div class="d1cccc">
            <img src="/images/Asset_img/noOrdir.svg" alt="">
            <H5>No Orders.</H5>
        </div> 
    @endif



  </div>
</div>
