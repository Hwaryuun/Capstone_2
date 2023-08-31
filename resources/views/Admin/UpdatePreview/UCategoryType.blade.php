@extends('Admin.Layout.App')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/AddingCss.css')}}">
@endsection

@section('content')
@section('title','Service')
@section('navi','Service')


    <div class="main"> <!-- Main------------------------------------>


        <div class="Add-Holders"> <!-- Add Holder------------------------------------>

            <div class="Add-InPs"> <!-- Add Inp------------------------------------>

                <div class ="Top-Form">
                    <h1 class = "M-TITTL">Update Service</h1>      
                </div>

                <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>
                  
                      
                <form action="{{Route('CategoryType.update', $categorytype->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf  
                    @method('PUT')
                     
                    
                     <!-- Mid Seperator------------------------------------>

                        <div class = "S1"> <!-- Mid S1------------------------------------>

                            <div class="field">
                                <label> Service </label>
                                <input type="text" name="typename" placeholder="Example: Offset / Digital" value="{{old('typename') ?? $categorytype->typename}}" style="@error('typename') border: 1px solid red; @enderror" >
                                <span style="color: red;">@error('typename') {{$message}} @enderror </span>
                             </div>  
        
                             <div class="field">
                                <label>status</label>
                                <select class ="selects" name="status" id="" value="{{old('status')}}" style="@error('status') border: 1px solid red; @enderror">
                                @if($categorytype->status == "Active")
                                    <option value="Active" selected>Active</option>
                                    <option value="Inactive">Inactive</option>
                                @endif
                                @if($categorytype->status == "Inactive")
                                    <option value="Inactive" selected>Inactive</option>
                                    <option value="Active" >Active</option>
                                @endif  
                                </select>
                                <span style="color: red;">@error('status') {{$message}} @enderror </span>
                                
                             </div>  
          
                        </div>  <!-- Mid S1------------------------------------>

          
                        <div class="BUTNS-AD">
                            <a class ="Add-ITM-C"  href="{{Route('CategoryType.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>
                            <button class ="Add-ITM" type="submit"> <i class="fa-solid fa-circle-plus"></i> <span> Update </span></button>
                        </div>

                      
                </form>
                     
                   
   
                </div> <!-- Mid Inp------------------------------------>


            </div> <!-- Add Inp------------------------------------>

        </div> <!-- Add Holder------------------------------------>
    </div> 


        @endsection  

