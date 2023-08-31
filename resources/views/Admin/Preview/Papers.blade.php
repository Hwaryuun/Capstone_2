@extends('Admin.Layout.App')
@section('css')
<link rel="stylesheet" href="{{ asset('css/Specifications.css')}}">
@endsection
@section('content')
@section('title','Papers')
@section('navi','Papers')


    <div class="main"> 

         <!-- Primary end ------------------------------------------------------------------------------->    
        <div  class = "M-Table">

            <div class="Table-1" >

                <div class="Table-con">

                    <div class="Cnt">
                        <H3 class="ORP">Paper Stock</H3>
                        <p class="DY">Design Plus Paper Stock</p>
                    </div>

                    <div class="Cnt2">  
                        
                      @can('Specs-delete')
                      <div class = "A-DD">
                          <a  href="{{route('papersindex')}}" class ="ARCC">  <i class="fa-solid fa-box-archive"></i></a> 
                       </div>
                       @endcan

                       @can('Specs-create')
                       <div class = "A-DD">
                              <a  href="{{route('Papers.create')}}" class ="Add-P">  <i class="fa-solid fa-plus"></i> <span> New </span></a> <!--Modal Button any -->
                       </div>  
                       @endcan
                    </div> 
                </div>

                @can('Specs-view')
                <div class = " Table-Section">
                 <table id="Papers" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th>Paper Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                    @foreach($papers as $paper)
                      <tr>
                        <td>{{$paper->name}}</td>
                        <td>      
                          @if($paper->status == "Active")
                              <p class="Done">{{$paper->status}}</p>
                          @endif
                          @if($paper->status == "Inactive")
                              <p class="red">{{$paper->status}}</p>
                          @endif  
                        </td>
                        <td class="BTNS-EDTY"> 
                          
                     
                          @can('Specs-edit')
                          <a class="Edits" href ="{{Route('Papers.edit', $paper->id)}}" > <i class="fa-solid fa-pen-to-square"></i>   <span> EDIT </span> </a>  
                          @endcan

                          @can('Specs-delete')
                          <button class="Dlts"  onclick="deleteData({{$paper->id}})" type="submit"><i class="fa-solid fa-trash"></i>  <span> DELETE </span> </button>                      
                          <form id ="delete-form-{{$paper->id}}" action="{{Route('Papers.destroy', $paper->id)}}" method = "POST">
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