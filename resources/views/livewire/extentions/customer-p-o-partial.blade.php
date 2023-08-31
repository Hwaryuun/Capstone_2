<section  @if (count($carstats) != 0)  class="packagesxs" @else class="packagesxss" @endif id="package">
          
    @if (count($carstats) != 0) 
    
    <div class="d1c">     
        
        <div class="d1ccc">

            <div class="dcontentbb">
                <div class="field">
                    <H5 class="sumarryx"> Order Summary : </H5>                      
                </div> 
            </div> 

            <hr> 

            <div class="separatorAB">
                <div class="dcontentbcc">
                    <div class="field">
                        <H3 class="sumarrys00">Product :</H3>                            
                    </div> 
                </div> 
                <div class="dcontentbcc">
                    <div class="field">
                        <H3 class="sumarrys11">Quotation :</H3>    
                     
                    </div> 
                </div> 
                <div class="dcontentbcc">
                    <div class="field">
                        <H3 class="sumarrys22">Price: </H3>                               
                    </div> 
                </div> 
            </div> 

            <hr> 
            

            @foreach ($carstats as $cart)
                
            <div class="separatorAB">
                <div class="dcontentbc">
                    <div class="field">
                        <p class="sumarrys00">{{$cart->ProductPricing->Products->name}}</p>                                                    
                    </div> 
                </div> 
                <div class="dcontentbc">
                    <div class="field">
                        <p class="sumarrys11">{{$cart->paperdefault}}</p> 
                        <p class="sumarrys11">{{$cart->cover}}</p>  
                        <p class="sumarrys11">{{$cart->ProductPricing->Size->length}} x {{$cart->ProductPricing->Size->width}}</p>          
                        @if ($cart->page)
                        <p class="sumarrys11">{{$cart->page}}. leaves</p>  
                        @endif
                        <p class="sumarrys11">{{$cart->quantity}}. pcs</p>  
                        <p class="sumarrys11"><a onclick="showie('{{$cart->files}}')"> My Design : <i class="fa-solid fa-pen-nib"></i> </a></p>                              
                    </div> 
                </div> 

                <div class="dcontentbc">
                    <div class="field">
                        <p class="sumarrys22">₱ : {{number_format((float)$cart->CartPrice->defaultprice, 2,".",",") }}.php  </p>
                        @if ($cart->page)    
                        <p class="sumarrys22">₱ : {{number_format((float)$cart->CartPrice->coverprice, 2,".",",") }} </p> 
                        @endif        
                        <p class="sumarrys22">₱ : {{number_format((float)$cart->CartPrice->sizeprice, 2,".",",") }} </p>   
                        @if ($cart->page)    
                        <p class="sumarrys22">₱ : {{number_format((float)$cart->CartPrice->leafprice, 2,".",",") }} </p>
                        @endif       
                        <p class="sumarrys22"> {{$cart->CartPrice->quantity}} </p>   
                                   
                    </div> 
                </div> 

            </div> 
            <hr> 
            <div class="separatorA">
                <div class="dcontentbc">
                    <div class="field">
                        <p class="sumarrys00"> Sub-Total 50% : </p>                            
                    </div> 
                </div> 
                <div class="dcontentbc">
                    <div class="field">
                        <p class="sumarrys22">₱ : {{number_format((float)$cart->price/2, 2,".",",") }}</p>                                                      
                    </div> 
                </div> 
            </div> 

            <hr> 
            @endforeach

            <div class="separatorA">
                <div class="dcontentb">
                    <div class="field">
                        <H3 class="sumarrys20"> Total : </H3>                            
                    </div> 
                </div> 
                <div class="dcontentb">
                    <div class="field">
                        <H3 class="sumarrys21">₱ :  {{number_format((float)$carstats->sum('price')/2, 2,".",",") }}</H3>                                                      
                    </div> 
                </div> 
            </div> 
            <hr> 
        </div>

    </div>

    <div class="d1c">

        <div class="d1cc">

                <div class="dcontentbb">
                    <div class="field">
                        <H5 class="sumarry">Check Out </H5>                            
                    </div> 
                </div> 
                <hr> 
                <div class="separatorz">
                    <div class="field">
                        <label>First Name</label>
                        <input type="text" id="firstname" value="{{auth('customer')->user()->firstname}}"  disabled   >
                        {{-- <span style="color: red;">@error('firstname') {{$message}} @enderror </span> --}}
                    </div>  

                    <div class="field">
                        <label>Last Name</label>
                        <input type="text"   id="lastname"  value="{{auth('customer')->user()->lastname}}" disabled   >
                        {{-- <span style="color: red;">@error('lastname') {{$message}} @enderror </span> --}}
                    </div>  
                </div>
                 <div class="field">
                    <label>Phone <span class="asterisk"> * </span>  </label>
                    <input type="number" onKeyPress="if(this.value.length==16) return false;"  id="phone" wire:model="phone" value="" style="@error('phone') border: 1px solid rgb(255, 80, 80); @enderror" >
                    <span style="color: red;">@error('phone') {{$message}} @enderror </span>
                 </div>  

                 <div class="field">
                    <label>Email Adress <span class="asterisk"> * </span>  </label>
                    <input type="email" id="emailadd" wire:model="emailadd"  value="" style="@error('emailadd') border: 1px solid rgb(255, 80, 80); @enderror" >
                    <span style="color: red;">@error('emailadd') {{$message}} @enderror </span>
                 </div>  

                 <div class="field">
                    <label>Remarks "Optional"</label>
                    <textarea wire:model="remarks" id="remarks"> </textarea>
                    <span style="color: red;">@error('remarks') {{$message}} @enderror </span>
                 </div>  

                 <div class="field">
                    <label> Terms and Condtion <a href="{{route('DsInfo')}}"  style="color: blue" target="_blank" > " Here "  </a>  </label>                      
               
                    <span class="tilesii">                
                        <input type="checkbox" wire:model="condition" id="condition" value="1" > 
                        <label class="forx2" for="condition"> Accept Terms and Condition. </label>  
                        <p class="alisdyan">  @error('condition') Terms and Condition must be accepted @enderror </p>          
                    </span>
                </div>  
{{-- 
                 <div class="BUTNS-ADSX"> --}}
                     <button  style="display:none;" class ="Add-ITME" wire:click="onEntr"> <i class="fa-solid fa-upload"></i> <span> Transac </span></button>                  
                 {{-- </div> --}}

                <div class="BUTNS-ADSX" wire:ignore>
                      <div id="paypal-button-container"></div>                                       
                </div>    
        </div>
    </div>

    @else
        <div class="d1cccc">
            <img src="/images/Asset_img/checkout.svg" alt="">
            <H5> Ordered Successfully! </H5>
            <p> <b> Order ID :</b> {{$this->pay_id}}  <br>  <b> Job ID : </b> {{$this->ref}} </p>
            <a href="{{Route('ShopSpecs.index')}}" class ="Add-ITMEX"> <i class="fa-solid fa-square-caret-left"></i> <span> Go Back </span></a>
        </div> 
    @endif



</section>

<script src="https://www.paypal.com/sdk/js?client-id=ARrj8YpRCgrQaO03dkPqTFZ2hqlBfbjIUEFyxZeSUvn6rTnAYEz-GDfnGIkRO6-ZxsAUNJ4M9RdRqxEt&currency=PHP"></script>
<script>
    paypal.Buttons({ 

        onClick: function()  {
            if ( !document.getElementById('phone').value
                || !document.getElementById('emailadd').value
                || !document.getElementById('condition').checked
               ) 
            {
      
                Livewire.emit('validationForAll');
                return false;
            }else{
                @this.set('firstname', document.getElementById('firstname').value);
                @this.set('lastname', document.getElementById('lastname').value);
                @this.set('phone', document.getElementById('phone').value);
                @this.set('emailadd', document.getElementById('emailadd').value);
                @this.set('remarks', document.getElementById('remarks').value);
            }
        },
      // Sets up the transaction when a payment button is clicked
      createOrder: (data, actions) => {
        return actions.order.create({
          purchase_units: [{
            amount: {
              value: '{{number_format((float)$carstats->sum('price')/2, 2, '.', '') }}'
            }
          }]
        });
      },

      onApprove: (data, actions) => {
        return actions.order.capture().then(function(orderData) {
          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
          const transaction = orderData.purchase_units[0].payments.captures[0];

          if(transaction.status == "COMPLETED"){
            Livewire.emit('trasactionEmit', transaction.id);
            
            Toast.fire({
				icon: 'success',
				title: 'Order Place Successfully !',
                timer: 3500
		    });
            
          }else{

            Toast.fire({
				icon: 'warning',
				title: 'Connection Time Out !',
                timer: 3500
		    });

          }
         // alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
        });
      }
    }).render('#paypal-button-container');
  </script>


