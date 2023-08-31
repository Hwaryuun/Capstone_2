@extends('Admin.Layout.App')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Category.css')}}">
@endsection

@section('content')
@section('title','Pricing Type')
@section('navi','Pricing Type')

<div class="main"> 

    <!-- Primary end ------------------------------------------------------------------------------->
   <div  class = "M-Table">

    <div class="Table-1" >

        <div class="Table-con">

            <div class="Cnt">
                <H3 class="ORPRED">Pricing Type : Archive</H3>
                <p class="DY">Support Group</p>
            </div>

            <div class="Cnt2h">           
                <div class = "A-DD">
                   <a  href="{{Route('PaperTypes.index')}}"  class ="Add-P"> <i class="fa-solid fa-reply"></i> <span> Return </span></a> <!--Modal Button any -->
               </div>  
           </div>


        </div>

        <div class = " Table-Section">
         <table id="PricingType" class="display" style="width:100%">
            <thead>
              <tr>             
                <th>Name</th>
                <th>Deleted</th>
                <th>Action</th>
                
              </tr>
            </thead>
            <tbody>


            @foreach($papertypes as $pt)

            <tr>
              <td>{{$pt->name}}</td>  
              <td>{{$pt->deleted_at->diffForHumans()}}</td>    
             
              <td class="BTNS-EDTY">    

                  <button class="Dlts" onclick="deleteDataPermanent({{$pt->id}})"  type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button>
                  <form id ="deleteP-form-{{$pt->id}}" action="{{Route('ptypedestroy', $pt->id)}}" method = "POST"> 
                        @csrf
                        @method('DELETE')
                  </form>

                  <button class="EditsT"  onclick="resetData({{$pt->id}})" type="submit"><i class="fa-solid fa-repeat"></i> <span> RESTORE </span> </button> 
                  <form  id ="reset-form-{{$pt->id}}" action="{{Route('ptypetore', $pt->id)}}" method = "POST"> 
                        @csrf
                        @method('PUT')                     
                  </form>
              </td> 

            </tr>
            

            @endforeach
              
            </tbody>
          </table>         
        </div>

    </div>


   </div>

</div>


@endsection  