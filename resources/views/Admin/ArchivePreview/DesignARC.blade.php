@extends('Admin.Layout.App')

@section('css')
<link rel="stylesheet" href="{{ asset('css/FeaturedNTemplates.css')}}">
@endsection
@section('content')
@section('title','Design')
@section('navi','Design')



<div class="main">

         <div  class = "M-Table">

            <div class="Table-1" >

                <div class="Table-con">
                    <div class="Cnt">
                        <H3 class="ORPRED">Design : Archive</H3>
                        <p class="DY">Designer Group</p>
                    </div>

                    
                    <div class="Cnt2h">  
                    
                        <div class = "A-DD">
                               <a  href="{{route('Design.index')}}" class ="Add-P"> <i class="fa-solid fa-reply"></i> <span> Return </span></a> <!--Modal Button any -->
                        </div>  
          
                   </div>

                </div>
    
                <div class = " Table-Section">
                <table id="Design" class="display" style="width:100%">
                    <thead>
                      <tr>
          
                        <th>Name</th>              
                        <th>Image-F</th>
                        <th>Image-B</th>
                        <th>Deleted</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($designs as $design)
                      <tr>
                        <td>{{$design->name}}</td>
                        <td><img class = "DisplayIM" src="/images/Clientfile_img/{{$design->imagef}}" alt=""></td>
                        <td><img class = "DisplayIM" src="/images/Clientfile_img/{{$design->imageb}}" alt=""></td>
                        <td>{{$design->deleted_at->diffForHumans()}}</td>  
                        <td class="BTNS-EDTY">    

                            <button class="Dlts" onclick="deleteDataPermanent({{$design->id}})" type="submit"><i class="fa-solid fa-trash"></i> <span> DELETE </span> </button>
                            <form id ="deleteP-form-{{$design->id}}" action="{{Route('DSdestroy', $design->id)}}" method = "POST"> 
                                @csrf
                                @method('DELETE')                                 
                             </form>

                             <button class="EditsT" onclick="resetData({{$design->id}})" type="submit"><i class="fa-solid fa-repeat"></i> <span> RESTORE </span> </button> 
                             <form id ="reset-form-{{$design->id}}" action="{{Route('DSstore', $design->id)}}" method = "POST"> 
                                @csrf
                                @method('PUT')                                 
                              </form>

                        </td>
                        

               

                    @endforeach
                    </tbody>
                  </table>
                </div>
    
            </div> <!--End Tabl01-->

         </div> <!--End M-Table-->

    </div> <!--End Main-->
 @endsection  
