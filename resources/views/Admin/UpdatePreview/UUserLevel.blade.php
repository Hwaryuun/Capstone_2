@extends('Admin.Layout.App')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/AddingCss.css')}}">
@endsection

@section('content')
@section('title','Roles')
@section('navi','Roles')


    <div class="main"> <!-- Main------------------------------------>


        <div class="Add-Holders"> <!-- Add Holder------------------------------------>

            <div class="Add-InPs"> <!-- Add Inp------------------------------------>

                <div class ="Top-Form">
                    <h1 class = "M-TITTL">Update Roles</h1>      
                </div>

                <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>

                      
                <form action="{{Route('UserLevel.update', $role->id)}}" method="POST" enctype="multipart/form-data" id = "SBMIT">
                    @csrf  
                    @method('put')
                    
                     <!-- Mid Seperator------------------------------------>

                        <div class = "S1"> <!-- Mid S1------------------------------------>

                            <div class="field">
                                <label>Roles</label>
                                <input type="text" name="name"  value="{{ old('name',$role->name) }}" >
                                <span style="color: red;">@error($errors->any()) {{$message}} @enderror </span>
                             </div>  

                             <div class="fieldsss">    
                                <label>Permission</label>  
                            </div> 
                            {{-- style="@error('name') border: 1px solid red; @enderror" --}}
                            <div class="fieldsssss">
                                @foreach ($permissions as $permission)
                                <div class="form-group">
                                    <input type="checkbox" id="javascript{{$permission->id}}" name= "permissions[]"  value="{{$permission->id}}" value="{{$permission->id}}"  @if(count($role->permissions->where('id',$permission->id)))
                                        checked @endif>
                                    <label for="javascript{{$permission->id}}">{{ $permission->name }}</label>
                                </div>
                                @endforeach 
                             </div>  
                        </div>  <!-- Mid S1------------------------------------>

          
                        <div class="BUTNS-AD">
                            <a class ="Add-ITM-C"  href="{{Route('UserLevel.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>
                            <button class ="Add-ITM" type="submit" id = "save"> <i class="fa-solid fa-circle-plus"></i> <span> Update </span></button>
                        </div>

                      
                </form>
                     
                   
   
                </div> <!-- Mid Inp------------------------------------>


            </div> <!-- Add Inp------------------------------------>

        </div> <!-- Add Holder------------------------------------>
    </div> 

 @endsection  
