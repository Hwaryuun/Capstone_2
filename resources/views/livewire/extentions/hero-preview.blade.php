<div>
    <!--Package section--->
            <div class="inps">

            
                    <h5 class="hedgepayb"> {{$productname}} </h5>
                    <div class="field">
                        <input type="text" hidden name="Product" value="{{$productname}}">
                    </div> 
                    

                <div class="separatorA">
                    <div class="field">
                        <label>Size</label>
                        <select class ="selects" name="Size" id="Size" wire:model="SizeInput">
                            <option value="">Select Size</option>
                            @foreach ($sizes as $size)
                                <option value="{{$size->id}}">{{$size->Size->length}} x {{$size->Size->width}}</option>
                            @endforeach
                        </select>     
                        <span style="color: red;">@error('Size') Choose a size @enderror </span>  
                    </div>  

                    <div class="field">
                        <label>Size Price</label>
                        <input type="text" style="border: 1px solid rgb(210, 161, 0)"  readonly  value=" ₱ : {{ number_format((float)$sizeprice, 2, '.', '') }}">
                    </div> 

                </div>

        
                    @if (count($paperspecs) != 0)
                        @if ($paperspecs[0]->category_id == $category_id)
                        <div class="separatorA">
                            <div class="field">
                                <label>Paper {{$paperspecs[0]->PaperTypes->name}}</label>
                                <select class ="selects" name="Paper1" id="Paper1" wire:model="PaperInput">
                                    <option value="">Select Paper</option>
                                    
                                    @foreach($paperspecs as $pprcsx)
                                    <option value="{{$pprcsx->id}}" >{{$pprcsx->Papers->name}} {{$pprcsx->lbs}}</option>
                                    @endforeach  
                                
                                </select>    
                                <span style="color: red;">@error('Paper1') Choose a Paper @enderror </span>          
                            </div> 

                            <div class="field">
                                <label>Paper Price</label>
                                <input  type="text" style="border: 1px solid rgb(210, 161, 0)"  readonly  value=" ₱ : {{ number_format((float)$paperprice, 2, '.', '') }}">
                            </div> 

                        </div>
                        @endif
                    @endif

                    
                    @if (count($paperspecs2) != 0)
                        @if ($paperspecs2[0]->category_id == $category_id)
                        <div class="separatorA">
                            <div class="field">
                                <label>Paper {{$paperspecs2[0]->PaperTypes->name}}</label>
                                <select class ="selects" name="Paper2" wire:model="PaperInput2">
                                    <option value="">Select Paper</option>
                                    
                                        @foreach($paperspecs2 as $pprcsx)
                                        <option value="{{$pprcsx->id}}">{{$pprcsx->Papers->name}} {{$pprcsx->lbs}}</option>
                                        @endforeach  
                                
                                </select>    
                                <span style="color: red;">@error('Paper2') {{$message}} @enderror </span>          
                            </div> 

                            <div class="field">
                                <label>Paper Price</label>
                                <input type="text" style="border: 1px solid rgb(210, 161, 0)" readonly  value=" ₱ : {{ number_format((float)$paperprice2, 2, '.', '') }}">
                            </div> 

                        </div>
                        @endif
                    @endif
            

                @if (count($leafs) != 0)
                        @if ($leafs[0]->category_id == $category_id)
                        <div class="separatorA">
                            <div class="field">
                                <label>Leaf Quantity / Page</label>
                                <select class ="selects" name="leaf" id="leaf" wire:model="LeafInput">
                                    <option value="">Select Page</option>
                                    @foreach($leafs as $leaf)
                                    <option value="{{$leaf->id}}">{{$leaf->quantity}}</option>
                                    @endforeach
                                </select>            
                            </div>  

                            <div class="field">
                                <label>Page Price</label>
                                <input type="text"  readonly style="border: 1px solid rgb(210, 161, 0)" value="  ₱ : {{ number_format((float)$pages, 2, '.', '') }} ">
                            </div>  
                        </div>  
                        @endif
                @endif
                
                <div class="separatorA">
                    <div class="field">
                        <label>Quantity</label>
                        <select class ="selects" name="quantity" id="quantity" wire:model="QuantityInput">
                            <option value="">Select Quantity</option>
                            @foreach ($quantities as $qty)
                                <option value="{{$qty->id}}">{{$qty->value}} {{$qty->PricingType->name}}</option>
                            @endforeach
                        </select>     
                        <span style="color: red;">@error('quantity') Choose a Quantity @enderror </span>        
                    </div>      

                        <div class="field">
                            <label>Quantity amount</label>
                            <input type="text" readonly style="border: 1px solid rgb(210, 161, 0)" value="{{$quantitty}} ">
                        </div>            
                    </div>
        
                <div class="separatorA">
                    <div class="field">
                        <label>Estimated Production</label>
                        <input type="text"  readonly value="{{$productiontime}} Working Days">
                    </div> 
                    <div class="field">
                        <label>Price Preview</label>
                        <input readonly  type="text" style="border: 1px solid rgb(210, 161, 0)" id="total" value="  ₱ : {{ number_format((float)$result, 2, ".",",") }}">
                    </div>
                </div> 

               <div class="BUTNS-AD">
                  {{-- <a href="{{Route('OrderSummary', [$product_id, $SizeInput, $PaperInput, $PaperInput2, $LeafInput, $QuantityInput])}}"class ="Add-ITME" type="submit"> <i class="fa-solid fa-upload"></i> <span> Upload </span></a> --}}
                  <a  class ="Add-ITMC"  href="\"> <i class="fa-solid fa-caret-left"></i> <span> Go Back </span></a>
                  <a class ="Add-ITME" href="{{route('CustomerLogin.index')}}"> <i class="fa-solid fa-upload"></i> <span> Proceed </span></a>      
               </div>
               <div class="BUTNS-ADSX">
                    <a class="asasas" href="{{route('DSTemplates', $product_id)}}" > <b style="color: #4f4f4f; margin-right: 10px "> No Design ? </b> Choose Templates First !</a>
               </div>
           </div>



</div>

