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
                      <H3 class="ORPRED">Leaf Quantity : Archive</H3>
                      <p class="DY">Support Group</p>
                  </div>
                  <div class="Cnt2h">  
                    
                    <div class = "A-DD">
                           <a  href="{{route('Leaf.index')}}" class ="Add-P"> <i class="fa-solid fa-reply"></i> <span> Return </span></a> <!--Modal Button any -->
                    </div>  
      
               </div>
              </div>

              <div class = " Table-Section">
               <table id="Quantity" class="display" style="width:100%">
                  <thead>
                    <tr>
                      <th>Quantity</th>  
                      <th>Add Value</th>  
                      <th>Category </th>      
                      <th>Deleted</th>      
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($leafs as $lf)
                    <tr>          
                      <td>{{$lf->quantity}}</td>
                      <td>{{ number_format((float)$lf->value, 2, '.', '') }}</td>
                      <td>{{$lf->Category->name}}</td>        
                      <td>{{$lf->deleted_at->diffForHumans()}}</td>    
                        

                      <td class="BTNS-EDTY">    

                        <button class="Dlts" onclick="deleteDataPermanent({{$lf->id}})"  type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button>
                        <form id ="deleteP-form-{{$lf->id}}" action="{{Route('LQdestroy', $lf->id)}}" method = "POST"> 
                            @csrf
                            @method('DELETE')
                         </form>

                         <button class="EditsT" onclick="resetData({{$lf->id}})" type="submit"><i class="fa-solid fa-repeat"></i> <span> RESTORE </span> </button> 
                         <form id ="reset-form-{{$lf->id}}" action="{{Route('LQstore', $lf->id)}}" method = "POST"> 
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