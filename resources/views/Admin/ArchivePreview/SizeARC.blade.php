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
                        <H3 class="ORPRED">Size : Archive</H3>
                        <p class="DY">Support Group</p>
                    </div>
                    <div class="Cnt2h">  
                    
                        <div class = "A-DD">
                               <a  href="{{route('Size.index')}}" class ="Add-P"> <i class="fa-solid fa-reply"></i> <span> Return </span></a> <!--Modal Button any -->
                        </div>  
          
                   </div>

                </div>

                <div class = " Table-Section">
                 <table id="Size" class="display" style="width:100%">
                    <thead>
                      <tr>
                        <th>Value</th>
                        <th>Deleted</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                        @foreach($sizes as $size)
                        <tr>
                            <td>{{$size->length}} x {{ $size->width}}</td> 
                            <td>{{$size->deleted_at->diffForHumans()}}</td>
                            <td class="BTNS-EDTY">    

                                <button class="Dlts" onclick="deleteDataPermanent({{$size->id}})" type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span>  </button>
                                <form id ="deleteP-form-{{$size->id}}" action="{{Route('szdestroy', $size->id)}}" method = "POST"> 
                                    @csrf
                                    @method('DELETE')                                     
                                 </form>
        
                                 <button class="EditsT" onclick="resetData({{$size->id}})" type="submit"><i class="fa-solid fa-repeat"></i> <span> RESTORE </span>  </button> 
                                 <form id ="reset-form-{{$size->id}}" action="{{Route('sztore', $size->id)}}" method = "POST"> 
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