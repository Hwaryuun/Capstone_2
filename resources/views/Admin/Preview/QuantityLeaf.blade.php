@extends('Admin.Layout.App')
@section('css')
<link rel="stylesheet" href="{{ asset('css/Specifications.css')}}">
@endsection
@section('content')
@section('title','Leaf Quantity')
@section('navi','Leaf Quantity')


   
ry end ------------------------------------------------------------------------------->

    <div class="main"> 

         <!-- Primary end ------------------------------------------------------------------------------->

         
        <div  class = "M-Table">

            <div class="Table-1" >

              <div class="Table-con">
                  <div class="Cnt">
                      <H3 class="ORP">Pages</H3>
                      <p class="DY">Design Plus Page</p>
                  </div>
                  <div class="Cnt2">  
                        
                    @can('Specs-delete')
                    <div class = "A-DD">
                        <a  href="{{route('LQindex')}}" class ="ARCC">  <i class="fa-solid fa-box-archive"></i></a> 
                     </div>  
                     @endcan
                     @can('Specs-create')
                     <div class = "A-DD">
                            <a  href="{{route('Leaf.create')}}" class ="Add-P">  <i class="fa-solid fa-plus"></i> <span> New </span></a> <!--Modal Button any -->
                     </div>
                     @endcan
                </div> 
              </div>

              @can('Specs-view')
              <div class = " Table-Section">
               <table id="Quantity" class="display" style="width:100%">
                  <thead>
                    <tr>
                      <th>Quantity</th>  
                      <th>Add Value</th>  
                      <th>Category </th>            
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($leafs as $lf)
                    <tr>          
                      <td>{{$lf->quantity}}</td>
                      <td>₱. {{ number_format((float)$lf->value, 2, '.', '') }}</td>
                      <td>{{$lf->Category->name}}</td>                   
                      <td> 
                          @if($lf->status == "Active")
                              <p class="Done">{{$lf->status}}</p>
                          @endif
                          @if($lf->status == "Inactive")
                              <p class="red">{{$lf->status}}</p>
                          @endif 
                      </td>
                      
                      <td class="BTNS-EDTY"> 
                                  
                          @can('Specs-edit')
                          <a class="Edits" href ="{{Route('Leaf.edit', $lf->id)}}" > <i class="fa-solid fa-pen-to-square"></i> <span> EDIT </span> </a>  
                          @endcan
                          @can('Specs-delete')
                          <button class="Dlts" onclick="deleteData({{$lf->id}})" type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button> 
                          <form id ="delete-form-{{$lf->id}}" action="{{Route('Leaf.destroy', $lf->id)}}" method = "POST">
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