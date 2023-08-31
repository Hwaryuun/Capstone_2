@extends('Admin.Layout.App')
@section('css')
<link rel="stylesheet" href="{{ asset('css/Specifications.css')}}">
@endsection
@section('content')
@section('title','Quantity')
@section('navi','Quantity')


   

    <div class="main"> 

         <!-- Primary end ------------------------------------------------------------------------------->

         
        <div  class = "M-Table">

            <div class="Table-1" >

                <div class="Table-con">
                    <div class="Cnt">
                        <H3 class="ORPRED">Quantity : Archive</H3>   
                        <p class="DY">Support Group</p>
                    </div>
                    <div class="Cnt2h">  
                    
                        <div class = "A-DD">
                               <a  href="{{route('Quantity.index')}}" class ="Add-P"> <i class="fa-solid fa-reply"></i> <span> Return </span></a> <!--Modal Button any -->
                        </div>  
          
                   </div>
                </div>

                <div class = " Table-Section">
                 <table id="Size" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th>Quantity</th>  
                        <th>Value</th>  
                        <th>Value By</th>            
                        <th>Service</th>
                        <th>Deleted</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($quantities as $quantity)
                      <tr>          
                        <td>{{$quantity->quantity}}</td>
                        <td>{{ number_format((float)$quantity->value, 2, '.', '') }}</td>
                        <td>{{$quantity->PricingType->name}}</td>    
                        <td>{{$quantity->CategoryType->typename}}</td>     
                        <td>{{$quantity->deleted_at->diffForHumans()}}</td>              
                        <td class="BTNS-EDTY">    

                            <button class="Dlts" onclick="deleteDataPermanent({{$quantity->id}})" type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span>  </button>
                            <form  id ="deleteP-form-{{$quantity->id}}" action="{{Route('Qdestroy', $quantity->id)}}" method = "POST"> 
                                @csrf
                                @method('DELETE')               
                             </form>
    
                             <button class="EditsT" onclick="resetData({{$quantity->id}})" type="submit"><i class="fa-solid fa-repeat"></i> <span> RESTORE </span>  </button> 
                             <form id ="reset-form-{{$quantity->id}}" action="{{Route('Qstore', $quantity->id)}}" method = "POST"> 
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