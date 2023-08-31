

@extends('Admin.Layout.App')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/AddingCss.css')}}">
@endsection

@section('content')
@section('title','Design')
@section('navi','Design')


    <div class="main"> <!-- Main------------------------------------>


        <div class="Add-Holder"> <!-- Add Holder------------------------------------>

            <div class="Add-InP"> <!-- Add Inp------------------------------------>

                <div class ="Top-Form">
                    <h1 class = "M-TITTL">New Design</h1>      
                </div>

                <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>

                  <form action="{{Route('Design.store')}}" method="POST" enctype="multipart/form-data">
                     @csrf  
                                        
                    <div class = "EXSepator"> <!-- Mid SEPERATOR------------------------------------>

                        <div class = "S1"> <!-- Mid S1------------------------------------>

                            <div class="field">
                                <label>Design Name</label>
                                <input type="text" name="name" placeholder="Example: VintageDesign" value="{{old('name')}}" style="@error('name') border: 1px solid red; @enderror" >
                                <span style="color: red;">@error('name') {{$message}} @enderror </span>
                            </div>  

                            <div class="field">

                              <label>Image Front</label>           
                              <div class="form">
                                  <div class="grid">
                                  
                                      <div class="form-element">
                                          <input type="file" id="file-1" name="imagef"  value="{{old('imagef')}}" style="@error('imagef') border: 1px solid red; @enderror">
                                          <label for="file-1" id="file-1-preview">                                            
                                              <img src="  " alt=""  value="{{old('imagef')}}" style="@error('imagef') border: 1px solid red; @enderror">
                                              <div> <span>Choose image</span></div>
                                          </label>

                                      </div>
                                  
                                  </div>
                              </div> 
                              <span style="color: red;">@error('imagef') {{$message}} @enderror </span>
                                                
                          </div> 
                           
          
                        </div><!-- Mid S1------------------------------------>

                        <div class = "S2"> <!-- Mid S2------------------------------------>



                           <div class="field">
                           <label>status</label>
                              <select class ="selects" name="status" id="" value="{{old('status')}}" style="@error('status') border: 1px solid red; @enderror">
                                  <option value="Active">Active</option>
                                  <option value="Inactive">Inactive</option>
                              </select>
                              <span style="color: red;">@error('status') {{$message}} @enderror </span>
                              
                           </div>  

                             <div class="field">

                              <label>Image Back</label>           
                              <div class="form">
                                  <div class="grid">
                                  
                                      <div class="form-element">
                                          <input type="file" id="file-2" name="imageb"  value="{{old('imageb')}}" style="@error('imageb') border: 1px solid red; @enderror">
                                          <label for="file-2" id="file-2-preview">                                            
                                              <img src="  " alt=""  value="{{old('imageb')}}" style="@error('imageb') border: 1px solid red; @enderror">
                                              <div> <span>Choose image</span></div>
                                          </label>

                                      </div>
                                  
                                  </div>
                              </div> 
                              <span style="color: red;">@error('imageb') {{$message}} @enderror </span>
                                                
                          </div> 


                          
                        </div> <!-- Mid S2------------------------------------>

                        <div class="BUTNS-AD">
                           <a class ="Add-ITM-C"  href="{{Route('Design.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>
                           <button class ="Add-ITM" type="submit"> <i class="fa-solid fa-circle-plus"></i> <span> Add </span></button>
                       </div>
             
           
                     
                   
                    </div> <!-- Mid Seperator------------------------------------>
                  </form>
                </div> <!-- Mid Inp------------------------------------>


            </div> <!-- Add Inp------------------------------------>

        </div> <!-- Add Holder------------------------------------>

        </div>
        @endsection  