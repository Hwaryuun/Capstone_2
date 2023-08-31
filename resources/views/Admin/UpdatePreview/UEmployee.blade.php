@extends('Admin.Layout.App')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/AddingCss.css')}}">
@endsection

@section('content')
@section('title','Employee')
@section('navi','Employee')

<div class="main"> <!-- Main------------------------------------>


    <div class="Add-Holder"> <!-- Add Holder------------------------------------>

        <div class="Add-InP"> <!-- Add Inp------------------------------------>

            <div class ="Top-Form">
                <h1 class = "M-TITTL">Update Employee</h1>      
            </div>

            <div class ="Mid-Form">  <!-- Mid Inp------------------------------------>


                <form action="{{Route('Permision.update', $user->id)}}" method="POST" enctype="multipart/form-data">
                @csrf 
                @method('put')

                <div class="field">

                    <label>First Name</label>
                    <input type="text" name="fullname" placeholder="Kengkoy" value="{{old('fullname', $user->name)}}" style="@error('first') border: 1px solid red; @enderror" >
                    <span style="color: red;">@error('fullname') {{$message}} @enderror </span>
           
                </div> 
        
                <div class = "EXSepator">                           
                
                    <div class="field">
                        <label>Email: </label>
                        <input type="text" name="email" placeholder="Shematsu" value="{{old('email', $user->email)}}" style="@error('email') border: 1px solid red; @enderror" >
                        <span style="color: red;">@error('email') {{$message}} @enderror </span>  
                        </div> 
                                                
                    <div class="field">
                        <label>Role</label>
                        <select class ="selects" name="roles" style="@error('confirm_password') border: 1px solid red; @enderror" >
                            @foreach($roles as $role)
                            <option value="{{ $role->id }}"   @if(count($user->roles->where('id',$role->id))) selected @endif>{{ $role->name }} </option>
                            @endforeach
                        </select>        
                        <span style="color: red;">@error('roles') {{$message}} @enderror </span>                
                    </div>  
                    
                </div> 
                         
                    <div class="BUTNS-AD">
                        <a class ="Add-ITM-C"  href="{{Route('Permision.index')}}"> <i class="fa-solid fa-circle-xmark"  ></i> <span> Back </span></a>
                        <button class ="Add-ITM" type="submit"> <i class="fa-solid fa-circle-plus"></i> <span> Add </span></button>
                    </div>
          
                </form>
                 

         
            </form>
            </div> <!-- Mid Inp------------------------------------>


        </div> <!-- Add Inp------------------------------------>

    </div> <!-- Add Holder------------------------------------>
</div> 
@endsection  

