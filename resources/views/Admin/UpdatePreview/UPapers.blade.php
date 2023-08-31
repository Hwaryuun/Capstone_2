@extends('Admin.Layout.App')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/AddingCss.css')}}">
@endsection

@section('content')
@section('title','Papers')
@section('navi','Papers')

    <div class="main"> <!-- Main------------------------------------>


        <div class="Add-Holder"> <!-- Add Holder------------------------------------>

            <div class="Add-InP"> <!-- Add Inp------------------------------------>

                <div class ="Top-Form">
                    <h1 class = "M-TITTL">New Papers</h1>      
                </div>

                <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>

                <form action="{{Route('Papers.update',$papers->id )}}" method="POST" enctype="multipart/form-data">
                     @csrf   
                     @method('PUT')

                            <div class="field">
                                <label>Paper Name</label>
                                <input type="text" name="name" placeholder="Example: C2S" value="{{old('name') ?? $papers->name }}" style="@error('name') border: 1px solid red; @enderror" >
                                <span style="color: red;">@error('name') {{$message}} @enderror </span>
                             </div>                                    

                             <div class="field">
                                <label>Status</label>
                                <select class ="selects" name="status" id="" value="{{old('status')}}" style="@error('status') border: 1px solid red; @enderror">
                                    @if($papers->status == "Active")
                                        <option value="Active" selected>Active</option>
                                        <option value="Inactive">Inactive</option>
                                    @endif
                                    @if($papers->status == "Inactive")
                                        <option value="Inactive" selected>Inactive</option>
                                        <option value="Active" >Active</option>
                                    @endif     
                                </select>
                                <span style="color: red;">@error('status') {{$message}} @enderror </span>
                                
                             </div>  

                        
                        <div class="BUTNS-AD">
                            <a class ="Add-ITM-C"  href="{{Route('Papers.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>
                            <button class ="Add-ITM" type="submit"> <i class="fa-solid fa-circle-plus"></i> <span> Update </span></button>
                         </div>                
            
                </form>

                </div> <!-- Mid Inp------------------------------------>


            </div> <!-- Add Inp------------------------------------>

        </div> <!-- Add Holder------------------------------------>

     

    </div><!-- Main------------------------------------>
        
    @endsection  