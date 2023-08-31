
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
                    <h1 class = "M-TITTL">Update Design</h1>      
                </div>

                <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>

                  <form action="{{Route('Design.update', $designs->id)}}" method="POST" enctype="multipart/form-data">
                     @csrf  
                     @method('PUT')
                                        
                    <div class = "EXSepator"> <!-- Mid SEPERATOR------------------------------------>

                        <div class = "S1"> <!-- Mid S1------------------------------------>

                            <div class="field">
                                <label>Design Name</label>
                                <input type="text" name="name" placeholder="Example: VintageDesign" value="{{old('name') ?? $designs->name}}" style="@error('name') border: 1px solid red; @enderror" >
                                <span style="color: red;">@error('name') {{$message}} @enderror </span>
                            </div>  

                            <div class="field">

                              <label>Image Front</label>           
                              <div class="form">
                                  <div class="grid">
                                  
                                      <div class="form-element">
                                          <input type="file" id="file-1" name="imagef"  value="{{old('imagef')}}" style="@error('imagef') border: 1px solid red; @enderror">
                                          <label for="file-1" id="file-1-preview">                                            
                                              <img src="/images/Clientfile_img/{{$designs->imagef}}" alt=""  value="{{old('imagef')}}" style="@error('imagef') border: 1px solid red; @enderror">
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
                                <select name="status">
                                    @if($designs->status == "Active")
                                        <option value="Active" selected>Active</option>
                                        <option value="Inactive">Inactive</option>
                                    @endif
                                    @if($designs->status == "Inactive")
                                        <option value="Inactive" selected>Inactive</option>
                                        <option value="Active" >Active</option>
                                    @endif                                   
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
                                              <img src="/images/Design_img/{{$designs->imageb}}" alt=""  value="{{old('imageb')}}" style="@error('imageb') border: 1px solid red; @enderror">
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
                           <button class ="Add-ITM" type="submit"> <i class="fa-solid fa-circle-plus"></i> <span> Update </span></button>
                       </div>
             
           
                     
                   
                    </div> <!-- Mid Seperator------------------------------------>
                  </form>
                </div> <!-- Mid Inp------------------------------------>


            </div> <!-- Add Inp------------------------------------>

        </div> <!-- Add Holder------------------------------------>

        </div>
        @endsection  