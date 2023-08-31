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
              <H3 class="ORP">Product Pricing</H3>
              <p class="DY">Design Plus Product Pricing</p>
          </div>

          
          <div class="Cnt2">  
                    
            @can('Specs-delete')
            <div class = "A-DD">
                <a  href="{{route('pindex')}}" class ="ARCC">  <i class="fa-solid fa-box-archive"></i></a> 
             </div> 
            @endcan 

            @can('Specs-create')
             <div class = "A-DD">
                    <a  href="{{route('Pricing.create')}}" class ="Add-P">  <i class="fa-solid fa-plus"></i> <span> New </span></a> <!--Modal Button any -->
             </div>
             @endcan  

          </div> 

      </div>

      @can('Specs-view')
      <div class = " Table-Section">
       <table id="Pricing" class="display" style="width:100%">
          <thead>
            <tr>             
              <th>Product</th>
              <th>Size</th>
              <th>Pricing Type</th>
              <th>Price</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>


          @foreach($pricing as $prc)
            <tr>
          
              <td>{{$prc->Products->name}}</td>
              <td>{{$prc->Size->length}} x {{$prc->Size->width}}</td>
              <td>{{$prc->PricingType->name}}</td>
              <td>₱ {{ number_format((float)$prc->price, 2, '.', '') }}</td>
              <td> 
                  @if($prc->status == "Active")
                      <p class="Done">{{$prc->status}}</p>
                  @endif
                  @if($prc->status == "Inactive")
                      <p class="red">{{$prc->status}}</p>
                  @endif 
              </td>
              <td class="BTNS-EDTY">    

           
                   @can('Specs-edit')
                   <a class="Edits" href ="{{Route('Pricing.edit', $prc->id)}}" > <i class="fa-solid fa-pen-to-square"></i> <span> EDIT </span> </a> 
                   @endcan
                   @can('Specs-delete')
                   <button class="Dlts" onclick="deleteData({{$prc->id}})" type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button>
                   <form id ="delete-form-{{$prc->id}}" action="{{Route('Pricing.destroy', $prc->id)}}" method = "POST">
                   @csrf
                   @method('DELETE')
                  </form> 
                   @endcan  

               </td>
           

            </tr>

          @endforeach
            
          </tbody>
        </table>         
      </div>

      @else

      <div class="SAIBASA">
          <H3 class="ORP">YOU HAVE NO ACCESS TO VIEW THIS DATA!!</H3>
          <p class="DY">Reffer To Design Plus Admin to have an access to this Specifications data.</p>
      </div>

      @endcan

  </div>

   </div>

</div>


@endsection  