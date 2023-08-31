@extends('Admin.Layout.App')
@section('css')
<link rel="stylesheet" href="{{ asset('css/Specifications.css')}}">
@endsection
@section('content')
@section('title','Size')
@section('navi','Size')



    <div class="main"> 

         <!-- Primary end ------------------------------------------------------------------------------->

         
        <div  class = "M-Table">

            <div class="Table-1" >

                <div class="Table-con">
                    <div class="Cnt">
                        <H3 class="ORP">Sizes</H3>
                        <p class="DY">Design Plus Sizes</p>
                    </div>
                    <div class="Cnt2">  
                        
                      @can('Specs-delete')
                      <div class = "A-DD">
                          <a  href="{{route('szindex')}}" class ="ARCC">  <i class="fa-solid fa-box-archive"></i></a> 
                       </div>  
                       @endcan 

                       @can('Specs-create')
                       <div class = "A-DD">
                              <a  href="{{route('Size.create')}}" class ="Add-P">  <i class="fa-solid fa-plus"></i> <span> New </span></a> <!--Modal Button any -->
                       </div>
                       @endcan 
                    
                  </div> 

                </div>

                @can('Specs-view')
                <div class = " Table-Section">
                 <table id="Size" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th>Value</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                   
                        @foreach($sizes as $size)
                        <tr>
                          <td>{{$size->length}} x {{ $size->width}}</td> 
                          <td>
                                @if($size->status == "Active")
                                    <p class="Done">{{$size->status}}</p>
                                @endif
                                @if($size->status == "Inactive")
                                    <p class="red">{{$size->status}}</p>
                                @endif 
                          </td>
                          <td class="BTNS-EDTY"> 
                         
                            @can('Specs-edit')
                            <a class="Edits" href ="{{Route('Size.edit', $size->id)}}" > <i class="fa-solid fa-pen-to-square"></i> <span> EDIT </span> </a>  
                            @endcan 
                            @can('Specs-delete')
                            <button class="Dlts" onclick="deleteData({{$size->id}})" type="submit"><i class="fa-solid fa-trash"></i>  <span> DELETE </span> </button> 
                            <form id ="delete-form-{{$size->id}}" action="{{Route('Size.destroy', $size->id)}}" method = "POST">
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