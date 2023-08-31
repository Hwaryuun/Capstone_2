<div>
    <div class="c1">
                
        <div class="d1c">
       
            <div class="d1cc">
                    <div class="dcontentbb">
                        <div class="field">
                            <H5 class="sumarry">Order Summary </H5>                            
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

                 
      
              @foreach ($carstats as $arts) 
                <div class="separatorABC">

                    <div class="dcontentb">
                        <div class="field">
                            <p class="sumarrys">ITEM.{{$arts->id}}  </p>                            
                        </div> 
                    </div> 

                    <div class="dcontentb">
                        <div class="field">
                            <p class="sumarrys">{{$arts->ProductPricing->Products->name}}  </p>                            
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
                        <H3 class="sumarrys"> Total "Partial"  50% : </H3>                            
                    </div> 
                </div> 

                <div class="dcontentb">
                    <div class="field">
                        <H3 class="sumarrys1">₱ {{number_format((float)$carstats->sum('price')/2, 2, ".",",") }} </H3>                            
                    </div> 
                </div> 

            </div> 

            <div class="separatorA">

                <div class="dcontentb">
                    <div class="field">
                        <H3 class="sumarrys"> Total "Full" : </H3>                            
                    </div> 
                </div> 

                <div class="dcontentb">
                    <div class="field">
                        <H3 class="sumarrys1">₱  {{number_format((float)$carstats->sum('price'), 2,".",",") }} </H3>                            
                    </div> 
                </div> 

            </div> 
        
                <div class="BUTNS-ADS"> 

                    {{-- <a href="{{Route('PlaceOrderPartial' )}}"  class ="Add-ITME"> <i class="fa-solid fa-money-check"></i> <span> Half Check Out</span></a>
                    <a href="{{Route('PlaceOrder' )}}" class ="Add-ITME"> <i class="fa-solid fa-money-check"></i> <span> Full Check Out </span></a>
                    --}}
                    <a @if(count($carstats) != 0)  style="border: none;" href="{{Route('PlaceOrderPartial' )}}"  @endif style="border: 2px dashed #e9e9e9;"  class ="Add-ITME"> <i class="fa-solid fa-money-check"></i> <span> Half Check Out</span></a>
                    <a @if(count($carstats) != 0)  style="border: none;" href="{{Route('PlaceOrder' )}}"  @endif style="border: 2px dashed #e9e9e9;"  class ="Add-ITME"> <i class="fa-solid fa-money-check"></i> <span> Full Check Out </span></a>
                   
                </div>
                <div class="BUTNS">             
                <a href="{{Route('MyOrders')}}" class ="Add-ITMC" type="submit"> <i class="fa-solid fa-receipt"></i><span> My Orders </span></a>
                </div>
            </div>
        </div>


        <div class="d2c">

            <div class="dcontentc">

            @if(count($cart) != 0)
                             
                <div class="destination-contentyz">

                    @foreach($cart as $carts)
        
                    <div class="duals">

                        <div class="col-contentxz">   <!-- it can be href --> 
                    
                            <img src="/images/Product_img/{{$carts->ProductPricing->Products->image}}">               
                        </div>
                        <div class="col-contentxz">

                            {{-- target ="_blank" href="/images/Clientfile_img/{{$carts->files}}" --}}
                            <h5 class="h55">{{$carts->ProductPricing->Products->name}}</h5>
                            <p class="ppps">  <b>My Design : </b><a  onclick="showie('{{$carts->files}}')" > Here </a></p> 
               
                            <p class="ppp">{{$carts->paperdefault}}</p>
                            <p class="ppp">{{$carts->cover}}</p>
                            <p class="ppp">Quantity : {{$carts->quantity}}</p>
                            <p class="ppp"> Price : {{number_format((float)$carts->price, 2, ".",",") }}</p>
                    
                            {{-- <a href=""> <i class="fa-solid fa-pen-to-square"></i></a> --@if($carts->status == "cart1")  checked  @else  @endif  --}}
                            <button  onclick="deletecart({{$carts->id}})" title="Remove" ><i class="fa-solid fa-trash"></i></i></button>                   
                            <span class="tile" title="Check Out">
                                <input type="checkbox"  id="sport1{{$carts->id}}"  value="{{$carts->id}}" wire:click="Usrcart({{ $carts->id }})"  @if($carts->status == "cart1") checked @endif  > 
                                <label class="forx2" for="sport1{{$carts->id}}"> <i class="fa-solid fa-money-check"></i> </label>
                            </span>
                            
                            <form id ="delete-form-{{$carts->id}}" action="{{Route('ShopSpecs.destroy', $carts->id)}}" method = "POST">
                                @csrf
                                @method('DELETE')
                            </form>   
                             {{--                        
                            <span>{{$Usrcart}}</span>  
                             <button class = "btn2"> <i class="fa-solid fa-money-check"></i></button>   wire:model="Usrcart" --}}
                                
                        </div>
                  
                    </div>
                    @endforeach 
                </div>
                <div class="pagi">{{$cart->links('chai')}}</div>
            @else

            <div class="d1cccc">
                    <img src="/images/Asset_img/EmptyCart.svg" alt="">
                    <H5>No Items In The Cart.</H5>
                    <a href="{{Route('Shopping.index')}}" class ="Add-ITMEX"> <i class="fa-solid fa-cart-shopping"></i> <span> Show Now ! </span></a>
            </div> 
            @endif


            </div>
        </div>
  </div>
</div>

