@extends('Admin.Layout.App')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/Category.css')}}">
@endsection

@section('content')
@section('title','Pricing')
@section('navi','Pricing')

<div class="main"> 

    <!-- Primary end ------------------------------------------------------------------------------->
   <div  class = "M-Table">

    <div class="Table-2" >

      <div class="Table-con">

          <div class="Cnt">
              <H3 class="ORPRED">Product Pricing : Archive</H3>
              <p class="DY">Support Group</p>
          </div>

          
          <div class="Cnt2h">           
            <div class = "A-DD">
               <a  href="{{Route('Pricing.index')}}"  class ="Add-P"> <i class="fa-solid fa-reply"></i> <span> Return </span></a> <!--Modal Button any -->
           </div>  
       </div>

      </div>

      <div class = " Table-Section">
       <table id="Pricing" class="display" style="width:100%">
          <thead>
            <tr>             
              <th>Product</th>
              <th>Size</th>
              <th>Pricing Type</th>
              <th>Price</th>
              <th>Deleted</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>


          @foreach($pricing as $prc)
            <tr>
          
              <td>{{$prc->Products->name}}</td>
              <td>{{$prc->Size->length}} x {{$prc->Size->width}}</td>
              <td>{{$prc->PricingType->name}}</td>
              <td>{{ number_format((float)$prc->price, 2, '.', '') }}</td>
              <td>{{$prc->deleted_at->diffForHumans()}}</td>    

                   
              <td class="BTNS-EDTY">    

                <button class="Dlts"  onclick="deleteDataPermanent({{$prc->id}})" type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button>
                <form id ="deleteP-form-{{$prc->id}}" action="{{Route('pdestroy', $prc->id)}}" method = "POST"> 
                    @csrf
                    @method('DELETE')
                 </form>

                 <button class="EditsT" onclick="resetData({{$prc->id}})" type="submit"><i class="fa-solid fa-repeat"></i> <span> RESTORE </span> </button> 
                 <form id ="reset-form-{{$prc->id}}" action="{{Route('pstore', $prc->id)}}" method = "POST"> 
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