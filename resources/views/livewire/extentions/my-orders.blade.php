<div>
 
    <div  @if(count($sumeru) != 0 & count($partial) != 0) class="c1s"  @elseif (count($partial) == 0)  @if (count($partials) == 0)   class="c11"   @else  class="c111"  @endif @endif  >
        
    @if(count($sumeru) != 0)
        
        <div class="d2c">

            <div class="dcontentcx">
                         
                <div class="destination-contentyz">

                    @foreach($partials as $carts)
        
                    <div  @if ($csx == $carts->id) class="dualsx2" @else class="dualsx"  @endif >

                        <div class="col-contentxzy">   <!-- it can be href --> 
                            <img src="/images/Product_img/{{$carts->Carts->ProductPricing->Products->image}}">               
                        </div>
                        <div class="col-contentxzy">
                                     
                            @if ($csx == $carts->id)
                           
                            <div class="slasher">
                                <h5 class="h55"> <i class="fa-solid fa-circle" style="color: red;"></i> {{$carts->Carts->ProductPricing->Products->name}}</h5>
                                <hr>
                                <p class="ppp"> <b>Size : </b> {{$carts->Carts->ProductPricing->Size->length}} x {{$carts->Carts->ProductPricing->Size->width}}</p>
                                <p class="ppp"> <b>Stock : </b> {{$carts->Carts->paperdefault}}</p>
                                @if ($carts->Carts->cover != null)
                                <p class="ppp">  <b>Cover : </b> {{$carts->Carts->cover}} </p>
                                <p class="ppp">  <b>Page : </b>  {{$carts->Carts->page}}</p>
                                @endif
                                <p class="ppp"> <b>Quantity : </b> {{$carts->Carts->quantity}}.pcs </p>
                                <p class="ppps">  <b>Price : </b> ₱.{{number_format((float)$carts->price, 2, ".",",") }}</p>
                                <p class="ppps">  <b>My Design : </b><a onclick="showie('{{$carts->files}}')"> Here </a></p> 
                            </div>
              
                            @else
                            <h5 class="h55">{{$carts->Carts->ProductPricing->Products->name}}</h5>  
                            <hr>
                            <div class="contaminated"> <i class="fa-solid fa-circle" style="color: red;"></i> {{$carts->statusODR}}</div>
                            <div class="contaminated">{{$carts->Orders->tracking_no}}</div>        
                            @endif
                         
                            <span class="tilexxy" title="View">             
                                <input type="checkbox" id="sport1e{{$carts->id}}" @if($csx == $carts->id) @checked(true) wire:click="CSXG" @else wire:click="CSX({{$carts->id }})"  @endif  value="{{$carts->id}}">  
                                <label class="forx2" for="sport1e{{$carts->id}}"></label>
                            </span>
                            <span class="tilexx" title="Check out Balance" >             
                                <input type="checkbox" id="sport1{{$carts->id}}"  value="{{$carts->id}}" wire:click="Partials({{ $carts->id }})"  @if($carts->status == "partial1") checked @endif  >  
                                <label class="forx2" for="sport1{{$carts->id}}"> <i class="fa-solid fa-money-check"></i> </label>
                            </span>
                     
                        </div>
        
                    </div>
                    @endforeach
        
                </div>
                <div class="pagi">{{$partials->links('chai')}}</div>
            </div>
          
        </div>



        @if (count($partial) != 0)
        
            <div class="d1c">
            
                <div class="d1cc">
                        <div class="dcontentbb">
                            <div class="field">
                                <H5 class="sumarry">Partial Summary </H5>                            
                            </div> 
                        </div> 
                <hr> 

                    <div class="separatorABC">

                        <div class="dcontentb">
                            <div class="field">
                                <h3 class="sumarrys">ID :</h3>                            
                            </div> 
                        </div>

                        <div class="dcontentb">
                            <div class="field">
                                <h3 class="sumarrys">Items :</h3>                            
                            </div> 
                        </div> 

                        <div class="dcontentb">
                            <div class="field">
                                <h3 class="sumarrys1"> Price </h3   >                            
                            </div> 
                        </div> 

                    </div> 
                {{-- {{number_format((float)$sum, 2, '.', '') }}  --}}

                    
        
                @foreach ($partial as $arts) 
                    <div class="separatorABC">

                        <div class="dcontentb">
                            <div class="field">
                                <p class="sumarrys">ITEM.{{$arts->id}}  </p>                            
                            </div> 
                        </div> 

                        <div class="dcontentb">
                            <div class="field">
                                <p class="sumarrys"> </p>                            
                            </div> 
                        </div> 
        
                        <div class="dcontentb">
                            <div class="field">
                                <p class="sumarrys1">₱ {{number_format((float)$arts->price, 2, ".",",") }} </p>                            
                            </div> 
                        </div> 
                    
                    </div> 

        
                @endforeach 
                <hr> 

                <div class="separatorA">

                    <div class="dcontentb">
                        <div class="field">
                            <H3 class="sumarrys"> Total : </H3>                            
                        </div> 
                    </div> 

                    <div class="dcontentb">
                        <div class="field">
                            <H3 class="sumarrys1">₱  {{number_format((float)$partial->sum('price'), 2, ".",",") }} </H3>                            
                        </div> 
                    </div> 

                </div> 
                    <div class="BUTNS-ADSX"> 
                        <a  @if(count($partial) != 0)  style="border: none; "  href="{{Route('PlaceOrderPaidPartial' )}}"  @endif  style="border: 2px dashed #e9e9e9;"   class ="Add-ITME"> <i class="fa-solid fa-money-check"></i> <span> Check Out </span></a>            
                    </div>
                </div>
            </div>
        @endif

      @else
            <div class="d1cccc">
                <img src="/images/Asset_img/Noitm.svg" alt="">
                <H5>No Partial Orders.</H5>
            </div> 
     @endif
  </div>
</div>

