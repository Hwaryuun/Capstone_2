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
                        <H3 class="ORPRED">Featured : Archive</H3>
                        <p class="DY">Support Group</p>
                    </div>
                    
                    <div class="Cnt2h">  
                    
                        <div class = "A-DD">
                               <a  href="{{route('FeaturedNTemplates.index')}}" class ="Add-P"> <i class="fa-solid fa-reply"></i> <span> Return </span></a> <!--Modal Button any -->
                        </div>  
          
                   </div>
            
                </div>
    
                <div class = " Table-Section">
                <table id="Featured" class="display" style="width:100%">
                    <thead>
                      <tr>
          
                        <th>Featured Name</th>   
                        <th>Product</th>           
                        <th>Design Name</th>
                        <th>Date Featured</th>
                        <th>Deleted</th>
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
                        <td>{{$ftr->deleted_at->diffForHumans()}}</td>    
                     
                       <td class="BTNS-EDTY">    

                            <button class="Dlts" onclick="deleteDataPermanent({{$ftr->id}})" type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button>
                            <form id ="deleteP-form-{{$ftr->id}}" action="{{Route('FTdestroy', $ftr->id)}}" method = "POST"> 
                                @csrf
                                @method('DELETE')                              
                            </form>

                            <button class="EditsT" onclick="resetData({{$ftr->id}})" type="submit"><i class="fa-solid fa-repeat"></i> <span> RESTORE </span> </button> 
                            <form id ="reset-form-{{$ftr->id}}" action="{{Route('FTstore', $ftr->id)}}" method = "POST"> 
                                @csrf
                                @method('PUT')                                 
                            </form>

                        </td>
                     
                      </tr>

                    @endforeach       
                    </tbody>
                  </table>
                </div>

            </div> <!--End Tabl02-->


         </div> <!--End M-Table-->

    </div> <!--End Main-->
 @endsection  
