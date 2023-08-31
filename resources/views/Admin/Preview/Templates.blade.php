@extends('Admin.Layout.App')

@section('css')
<link rel="stylesheet" href="{{ asset('css/FeaturedNTemplates.css')}}">
@endsection
@section('content')
@section('title','Templates')
@section('navi','Templates')

    <div class="main">
    
        <div  class = "M-Table">

            <div class="Table-3" >

                <div class="Table-con">
                    <div class="Cnt">
                        <H3 class="ORP">Templates</H3>
                        <p class="DY">Design Plus Templates</p>
                    </div>
                    <div class="Cnt2">  
                        
                      @can('Designs-delete')
                      <div class = "A-DD">
                          <a  href="{{route('TPLarchive')}}" class ="ARCC">  <i class="fa-solid fa-box-archive"></i></a> 
                       </div>
                      @endcan 
          
                       @can('Designs-create')
                       <div class = "A-DD">
                              <a  href="{{route('Templates.create')}}" class ="Add-P">  <i class="fa-solid fa-plus"></i> <span> New </span></a> <!--Modal Button any -->
                       </div>
                       @endcan  

                  </div> 
                </div>
    
                @can('Designs-view')
                <div class = " Table-Section">
                <table id="Template" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th>Template Name</th>
                        <th>Tag</th>
                        <th>Product</th>           
                        <th>Design Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
               <tbody>
                      @foreach($templates as $tempt)
                      <tr>
                        <td>{{$tempt->name}}</td>
                        <td>{{$tempt->tag}}</td>
                        <td>{{$tempt->Products->name}}</td>
                        <td>{{$tempt->Design->name}}</td>
                        <td>
                            @if($tempt->status == "Active")
                                <p class="Done">{{$tempt->status}}</p>
                            @endif
                            @if($tempt->status == "Inactive")
                                <p class="red">{{$tempt->status}}</p>
                            @endif  
                        </td>
                     
                        <td class="BTNS-EDTY">    
        
                          @can('Designs-edit')
                           <a class="Edits" href ="{{Route('Templates.edit', $tempt->id)}}" > <i class="fa-solid fa-pen-to-square"></i> <span> EDIT </span> </a>  
                          @endcan

                          @can('Designs-delete') 
                           <button class="Dlts" onclick="deleteData({{$tempt->id}})" type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button> 
                          <form id ="delete-form-{{$tempt->id}}" action="{{Route('Templates.destroy', $tempt->id)}}" method = "POST">
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
                    <p class="DY">Reffer To Design Plus Admin to have an access to this Templates data.</p>
                </div>
  
                @endcan


            </div> <!--End Tabl03-->

         </div> <!--End M-Table-->

    </div> <!--End Main-->
 @endsection  
