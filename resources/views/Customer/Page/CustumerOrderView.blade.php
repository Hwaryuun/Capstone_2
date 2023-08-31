@extends('Customer.Layout.CustomerApp')

@section('contentFE')
@section('TopTTL','OrderView')

        <section class="homes" id="home"> </section>

     
        <div class="specs">
            <a href=""> Shop </a> >>  <a href="{{Route('Shopping.index')}}"> Category </a> >> <a href="{{Route('SProducts', $products->id)}}"> Products</a> >> <a href="{{Route('quotation', $products->id)}}"> Specification</a> >> <a href=""> Overview</a>
        </div>

        <div class="specsxa">
            <span> OVERVIEW </span>
        </div>   


    <section class="packagesx" id="package">
                  
        <form action="{{Route('CartAdd')}}" method="POST" enctype="multipart/form-data">
            @csrf  

            <div class="d1c">           
                <div class="d1ccc">

                    <div class="dcontentbb">
                        <div class="field">
                            <H5 class="sumarryx"> Quotation Summary : </H5>                      
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
                                <p class="sumarrys11"> {{$products->name}} </p>   
                                <input type="text" hidden name="prodid" value="{{$products->id}}">  
                            </div> 
                        </div> 
                        <div class="dcontentbcc">
                            <div class="field">
                                <p class="sumarrys22">Amount </p>                            
                            </div> 
                        </div> 
                    </div> 

                    <hr> 
                    
                    <div class="separatorAB">
                        <div class="dcontentbc">
                            <div class="field">
                                <H3 class="sumarrys00">Size :</H3>   
                                <input type="text" hidden name="size" value="{{$sizes->id}}">                        
                            </div> 
                        </div> 
                        <div class="dcontentbc">
                            <div class="field">
                                <p class="sumarrys11">{{$sizes->Size->length}} x {{$sizes->Size->width}}</p>                            
                            </div> 
                        </div> 
                        <div class="dcontentbc">
                            <div class="field">
                                <input type="text" hidden name="sizeprices" value="{{number_format((float)$sizes->price, 2, '.', '') }}"> 
                                <p class="sumarrys22"> ₱ : {{number_format((float)$sizes->price, 2, '.', '') }} </p>                            
                            </div> 
                        </div> 
                    </div> 

                    <div class="separatorAB">
                        <div class="dcontentbc">
                            <div class="field">
                                <H3 class="sumarrys00">Paper :</H3>  
                                <input type="text" hidden name="default" value="{{$specs->Papers->name}} {{$specs->lbs}}">                           
                            </div> 
                        </div> 
                        <div class="dcontentbc">
                            <div class="field">
                                <p class="sumarrys11">{{$specs->Papers->name}} {{$specs->lbs}}</p>                            
                            </div> 
                        </div> 
                        <div class="dcontentbc">
                            <div class="field">
                                <input type="text" hidden name="defaultprices" value="{{ number_format((float)$specs->value, 2, '.', '') }}">  
                                <p class="sumarrys22" >₱. {{ number_format((float)$specs->value, 2, '.', '') }} </p>                            
                            </div> 
                        </div> 
                    </div> 
                    
                    @if ($specovers != "")
                    <div class="separatorAB">
                        <div class="dcontentbc">
                            <div class="field">
                                <H3 class="sumarrys00">Paper Cover:</H3>
                                <input type="text" hidden name="cover" value="{{$specovers->Papers->name}} {{$specovers->lbs}} ">                             
                            </div> 
                        </div> 
                        <div class="dcontentbc">
                            <div class="field">
                                <p class="sumarrys11"> {{$specovers->Papers->name}} {{$specovers->lbs}} </p>                            
                            </div> 
                        </div> 
                        <div class="dcontentbc">
                            <div class="field">
                                <input type="text" hidden name="coverprizes" value="{{ number_format((float)$specovers->value, 2, '.', '') }}"> 
                                <p class="sumarrys22">₱. {{ number_format((float)$specovers->value, 2, '.', '') }} </p>                            
                            </div> 
                        </div> 
                    </div> 
                    @endif
                    
                    @if ($leafs != "")
                    <div class="separatorAB">
                        <div class="dcontentbcc">
                            <div class="field">
                                <H3 class="sumarrys00">Page:</H3>           
                                <input type="text" hidden name="leaf" value="{{$leafs->quantity}}">                       
                            </div> 
                        </div> 
                        <div class="dcontentbcc">
                            <div class="field">
                                <p class="sumarrys11"> {{$leafs->quantity}} </p>                            
                            </div> 
                        </div> 
                        <div class="dcontentbcc">
                            <div class="field">
                                <input type="text" hidden name="leafprizes" value="{{number_format((float)$leafs->value, 2, '.', '') }}">
                                <p class="sumarrys22" >₱ : {{number_format((float)$leafs->value, 2, '.', '') }} </p>                            
                            </div> 
                        </div> 
                    </div>                      
                    @endif
      
                    <hr> 

                    <div class="separatorA">
                        <div class="dcontentb">
                            <div class="field">
                                <H3 class="sumarrys20"> Quantity : </H3>     
                                <input type="text" hidden name="quantity" value="{{$quantitys->quantity}}">                        
                            </div> 
                        </div> 
                        <div class="dcontentb">
                            <div class="field">
                                <H3 class="sumarrys21"> {{$quantitys->value}} {{$quantitys->PricingType->name}}</H3> 
                                <input type="text" hidden name="qtty" value="{{$quantitys->value}} {{$quantitys->PricingType->name}}">                              
                            </div> 
                        </div> 
                    </div> 

                    <div class="separatorA">
                        <div class="dcontentb">
                            <div class="field">
                                <H3 class="sumarrys20"> Production Time : </H3>                            
                            </div> 
                        </div> 
                        <div class="dcontentb">
                            <div class="field">
                                <H3 class="sumarrys21"> {{$products->eproduction}} Working Days</H3>                            
                            </div> 
                        </div> 
                    </div> 

                    <hr> 

                    <div class="separatorA">
                        <div class="dcontentb">
                            <div class="field">
                                <H3 class="sumarrys20"> Total Partial - 50%: </H3>                            
                            </div> 
                        </div> 
                        <div class="dcontentb">
                            <div class="field">
                                <H3 class="sumarrys21"> ₱ : {{number_format((float)$resulthalf, 2, ".",",") }}</H3>                            
                            </div> 
                        </div> 
                    </div> 

                    <div class="separatorA">
                        <div class="dcontentb">
                            <div class="field">
                                <H3 class="sumarrys20"> Total Full : </H3>                            
                            </div> 
                        </div> 
                        <div class="dcontentb">
                            <div class="field">
                                <H3 class="sumarrys21">₱ : {{number_format((float)$result, 2,".",",") }}</H3>       
                                <input type="number" hidden name="total" value="{{number_format((float)$result, 2, '.', '') }}">                               
                            </div> 
                        </div> 
                    </div> 

                    <hr> 

                    @if ($templates)

                    <div class="separatorA">
                        <div class="dcontentb">
                            <div class="field">
                                <H3 class="sumarrys20"> Template : </H3>                           
                            </div> 
                        </div> 
                        <div class="dcontentb">
                            <div class="field">
                                <H3 class="sumarrys21"> {{$templates->name}}</H3>       
                                <input type="hidden" hidden name="uploading" id="uploading" value="{{$templates->Design->imagef}}">           
                            </div> 
                        </div> 
                    </div> 
                        
                    @else


                    <div class="separatorAX">
                        <div class="dcontentb">
                            <div class="field">
                                <H3 class="sumarrys20"> Upload Your Design: </H3>                            
                            </div> 
                        </div> 
                        <div class="dcontentb">
                            <div class="fields">
                                <div class="con">
                                    <label for="uploading" id="uploading-btn">
                                        <i class="fa-solid fa-cloud-arrow-up"></i>
                                        <span id="texto">Choose file "Required"</span>
                                    </label>
                                    <input type="file" hidden name="uploading" id="uploading" required>
                                </div>                                               
                            </div> 
                        </div> 
                    </div> 



                    @endif
                 
                  

                    <div class="BUTNS-ADS">
                        <a href="{{Route('quotation', $products->id)}}" class ="Add-ITMC" > <i class="fa-solid fa-rotate-left"></i> <span> Back  </span></a>
                        <button class ="Add-ITME" type="submit"> <i class="fa-solid fa-cart-shopping"></i> <span> Add To Cart </span></button>                  
                    </div>
                  

                </div>
            </div>

        </form>

    </section>

    
    
@endsection  