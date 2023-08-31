@extends('Admin.Layout.App')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/AddingCss.css')}}">
@endsection

@section('content')
@section('title','Size')
@section('navi','Size')

    <!-- Primary end ------------------------------------------------------------------------------->


    <div class="main"> <!-- Main------------------------------------>


        <div class="Add-Holder"> <!-- Add Holder------------------------------------>

            <div class="Add-InP"> <!-- Add Inp------------------------------------>

                <div class ="Top-Form">
                    <h1 class = "M-TITTL">New Size</h1>      
                </div>

                <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>

                <form action="{{Route('Size.update', $sizes->id)}}" method="POST" enctype="multipart/form-data">
                      @csrf    
                      @method('PUT')  


                        <div class = "S1"> <!-- Mid S1------------------------------------>

                            <div class = "EXSepator">  

                                <div class="field">
                                   <label>Value: Length</label>
                                   <input type="number" step="any" name="length" placeholder="Example: 120" value="{{old('length') ?? $sizes->length }}" style="@error('length') border: 1px solid red; @enderror" >
                                   <span style="color: red;">@error('length') {{$message}} @enderror </span>
                                </div> 
                             
                                <div class="field">
                                   <label>Value: Width</label>
                                   <input type="number"  step="any" name="width" placeholder="Example: 130" value="{{old('width') ?? $sizes->width }}" style="@error('width') border: 1px solid red; @enderror" >
                                   <span style="color: red;">@error('width') {{$message}} @enderror </span>
                                </div> 
   
                               </div> 

                             <div class="field">
                                <label>Status</label>
                                <select class ="selects" name="status" id="" value="{{old('status')}}" style="@error('status') border: 1px solid red; @enderror">
                                    @if($sizes->status == "Active")
                                        <option value="Active" selected>Active</option>
                                        <option value="Inactive">Inactive</option>
                                    @endif
                                    @if($sizes->status == "Inactive")
                                        <option value="Inactive" selected>Inactive</option>
                                        <option value="Active" >Active</option>
                                    @endif                     
                                </select>
                                <span style="color: red;">@error('status') {{$message}} @enderror </span>
                                
                             </div>  
                      
                             <div class="BUTNS-AD">
                                <a class ="Add-ITM-C"  href="{{Route('Size.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>
                                <button class ="Add-ITM" type="submit"> <i class="fa-solid fa-circle-plus"></i> <span> Update </span></button>
                            </div>
                          
                        </div> <!-- Mid S2------------------------------------>

               
                
                    </div> <!-- Mid Seperator------------------------------------>

                </form>

                </div> <!-- Mid Inp------------------------------------>


            </div> <!-- Add Inp------------------------------------>

        </div> <!-- Add Holder------------------------------------>

     

    </div><!-- Main------------------------------------>
    @endsection  