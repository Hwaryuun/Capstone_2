@extends('Admin.Layout.App')
@section('css')
<link rel="stylesheet" href="{{ asset('css/Specifications.css')}}">
@endsection
@section('content')
@section('title','Specs')
@section('navi','Specs')


    <div class="main"> 

         <!-- Primary end ------------------------------------------------------------------------------->

        <div  class = "M-Table">

          <div class="Table-1" >

            <div class="Table-con">

                <div class="Cnt">
                    <H3 class="ORP">Adjustments</H3>
                    <p class="DY">Design Plus Adjustments</p>
                </div>

                <div class="Cnt2">  
                        
                  @can('Specs-delete')
                  <div class = "A-DD">
                      <a  href="{{route('spcindex')}}" class ="ARCC">  <i class="fa-solid fa-box-archive"></i></a> 
                   </div>
                   @endcan  
                       
                   @can('Specs-create')
                   <div class = "A-DD">
                          <a  href="{{route('PaperSpecs.create')}}" class ="Add-P">  <i class="fa-solid fa-plus"></i> <span> New </span></a> <!--Modal Button any -->
                   </div>
                   @endcan   
              </div> 

            </div>

            @can('Specs-view')
            <div class = " Table-Section">
             <table id="PaperSpecs" class="display" style="width:100%">
                <thead>
                  <tr>
                    <th>Category Name</th>
                    <th>Paper</th>
                    <th>Type</th>
                    <th>LBS</th>
                    <th>Value</th>
                    <th>Quantity</th>                 
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>

                @foreach($paperspecs as $specs)
                  <tr>
                    <td>{{$specs->Category->name}}</td>
                    <td>{{$specs->Papers->name}}</td>
                    <td>{{$specs->PaperTypes->name}}</td>
                    <td>{{$specs->lbs}} lbs</td>
                    <td>₱ {{ number_format((float)$specs->value, 2, '.', '') }}</td>
                    <td>{{$specs->quantity}} pcs</td>
                    <td>      
                        @if($specs->status == "Active")
                            <p class="Done">{{$specs->status}}</p>
                        @endif
                        @if($specs->status == "Inactive")
                            <p class="red">{{$specs->status}}</p>
                        @endif 
                    </td>
                    
                    <td class="BTNS-EDTY"> 
                      
                      @can('Specs-edit')
                      <a class="Edits" href ="{{Route('PaperSpecs.edit', $specs->id)}}" > <i class="fa-solid fa-pen-to-square"></i> <span> EDIT </span> </a>  
                      @endcan
                      @can('Specs-delete')
                      <button class="Dlts" onclick="deleteData({{$specs->id}})" type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button> 
                      <form id ="delete-form-{{$specs->id}}" action="{{Route('PaperSpecs.destroy', $specs->id)}}" method = "POST">
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