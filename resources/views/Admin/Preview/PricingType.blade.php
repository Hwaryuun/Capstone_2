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
                <H3 class="ORP">Pricing Type</H3>
                <p class="DY">Design Plus Pricing Type</p>
            </div>

            <div class="Cnt2">  
                        
              @can('Specs-delete')
              <div class = "A-DD">
                  <a  href="{{route('prtindex')}}" class ="ARCC">  <i class="fa-solid fa-box-archive"></i></a> 
               </div>
               @endcan  
  
               @can('Specs-create')
               <div class = "A-DD">
                      <a  href="{{route('PricingType.create')}}" class ="Add-P">  <i class="fa-solid fa-plus"></i> <span> New </span></a> <!--Modal Button any -->
               </div>
               @endcan  
 
  
            </div> 


        </div>

        @can('Specs-view')
        <div class = " Table-Section">
         <table id="PricingType" class="display" style="width:100%">
            <thead>
              <tr>             
                <th>Pricing By</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>


            @foreach($pricingtype as $pt)
              <tr>

                <td>{{$pt->name}}</td>
                <td> 
                    @if($pt->status == "Active")
                        <p class="Done">{{$pt->status}}</p>
                    @endif
                    @if($pt->status == "Inactive")
                        <p class="red">{{$pt->status}}</p>
                    @endif 
                </td>
                <td class="BTNS-EDTY">    
         
                  
                     @can('Specs-edit')
                     <a class="Edits" href ="{{Route('PricingType.edit', $pt->id)}}" > <i class="fa-solid fa-pen-to-square"></i> <span> EDIT </span> </a> 
                     @endcan
             
                    @can('Specs-delete')
                     <button class="Dlts" onclick="deleteData({{$pt->id}})" id = "show" type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button>
                     <form id ="delete-form-{{$pt->id}}" action="{{Route('PricingType.destroy', $pt->id)}}" method = "POST">
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