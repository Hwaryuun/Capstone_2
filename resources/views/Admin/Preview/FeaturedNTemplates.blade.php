@extends('Admin.Layout.App')

@section('css')
<link rel="stylesheet" href="{{ asset('css/FeaturedNTemplates.css')}}">
@endsection
@section('content')
@section('title','Featured')
@section('navi','Featured')

    <div class="main">
    
        <div  class = "M-Table">

            <div class="Table-2" >

                <div class="Table-con">

                    <div class="Cnt">
                        <H3 class="ORP">Featured</H3>
                        <p class="DY">Design Plus Featured</p>
                    </div>
                    
                    <div class="Cnt2">  
                        
                      @can('Designs-delete')
                      <div class = "A-DD">
                          <a  href="{{route('FTarchive')}}" class ="ARCC">  <i class="fa-solid fa-box-archive"></i></a> 
                       </div>  
                      @endcan

                      @can('Designs-create')
                       <div class = "A-DD">
                              <a  href="{{route('FeaturedNTemplates.create')}}" class ="Add-P">  <i class="fa-solid fa-plus"></i> <span> New </span></a> <!--Modal Button any -->
                       </div> 
                      @endcan 
         
                    </div> 
            
                </div>
    
                @can('Designs-view')
                <div class = " Table-Section">
                <table id="Featured" class="display" style="width:100%">
                    <thead>
                      <tr>
          
                        <th>Featured Name</th>   
                        <th>Product</th>           
                        <th>Design Name</th>
                        <th>Date Featured</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($featured as $ftr)
                      <tr>
                        <td>{{$ftr->name}}</td>
                        <td>{{$ftr->Products->name}}</td>
                        <td>{{$ftr->Design->name}}</td>
                        <td>{{$ftr->date}}</td>
                        <td>
                            @if($ftr->status == "Active")
                                <p class="Done">{{$ftr->status}}</p>
                            @endif
                            @if($ftr->status == "Inactive")
                                <p class="red">{{$ftr->status}}</p>
                            @endif  
                       </td>
                     

                        <td class="BTNS-EDTY">    

                      
                          @can('Designs-edit')
                             <a class="Edits" href ="{{Route('FeaturedNTemplates.edit', $ftr->id)}}" > <i class="fa-solid fa-pen-to-square"></i> <span> EDIT </span> </a>  
                          @endcan
                          @can('Designs-delete')
                             <button class="Dlts" onclick="deleteData({{$ftr->id}})" type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button>
                             <form id ="delete-form-{{$ftr->id}}" action="{{Route('FeaturedNTemplates.destroy', $ftr->id)}}" method = "POST">
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
                    <p class="DY">Reffer To Design Plus Admin to have an access to this Featured data.</p>
                </div>
  
                @endcan

            </div> <!--End Tabl02-->


         </div> <!--End M-Table-->

    </div> <!--End Main-->
 @endsection  


  